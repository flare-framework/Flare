document.addEventListener("DOMContentLoaded", function () {
    let isLoading = false;

    document.body.addEventListener('click', function (e) {
        let target = e.target;
        while (target && target.tagName !== 'A') {
            target = target.parentElement;
        }

        if (
            target &&
            target.tagName === 'A' &&
            target.hasAttribute('href') &&
            !target.hasAttribute('target')
        ) {
            const href = target.getAttribute('href');

            // عبور از لینک‌های خالی، داخلی یا خارجی
            if (
                !href ||
                href.startsWith('#') ||
                href.startsWith('javascript:')
            ) return;

            e.preventDefault();
            if (!isLoading) {
                sendAjax(href);
            }
        }
    });

    function sendAjax(page) {
        if (isLoading) return;
        isLoading = true;

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState === XMLHttpRequest.DONE) {
                isLoading = false;

                if (this.status === 200) {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(this.responseText, "text/html");

                    document.body.innerHTML = doc.body.innerHTML;

                    // Update head info (title, meta)
                    const newTitle = doc.querySelector('title');
                    if (newTitle) document.title = newTitle.textContent;

                    const newMetas = doc.querySelectorAll('meta[name], meta[property]');
                    newMetas.forEach(meta => {
                        const selector = meta.hasAttribute('name')
                            ? `meta[name="${meta.getAttribute('name')}"]`
                            : `meta[property="${meta.getAttribute('property')}"]`;

                        const existing = document.head.querySelector(selector);
                        if (existing) {
                            existing.replaceWith(meta);
                        } else {
                            document.head.appendChild(meta);
                        }
                    });

                    // History push
                    window.history.pushState(null, '', page);
                    document.dispatchEvent(new CustomEvent('contentUpdated', { detail: { page } }));
                } else {
                    document.body.innerHTML = `<p style="color:red">❌ Failed to load content.</p>`;
                }
            }
        };

        xhttp.open("GET", page, true);
        xhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest"); // امنیت پایه
        xhttp.send();
    }

    // برای بارگذاری مجدد JSهای لازم بعد از لود ایجکس
    document.addEventListener('contentUpdated', () => {
        // initCustomScripts();  اگر نیاز داری
    });
});
