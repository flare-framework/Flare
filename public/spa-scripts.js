let isLoading = false;

function sendAjax(url) {
    if (isLoading) return;
    isLoading = true;

    fetch(url, {
        headers: { 'X-Requested-With': 'Flare-SPA' }
    })
        .then(res => {
            if (!res.ok) throw new Error('Network error');
            return res.json();
        })
        .then(data => {
            if (data.title) document.title = data.title;

            // سایدبار
            const sidebar = document.getElementById('sidebarMenu');
            if (sidebar && data.sidebar) {
                const parsed = new DOMParser().parseFromString(data.sidebar, 'text/html');
                const newSidebar = parsed.body.querySelector('#sidebarMenu');
                if (newSidebar) sidebar.innerHTML = newSidebar.innerHTML;
                else sidebar.innerHTML = data.sidebar; // در صورتی که wrap نشده
            }

            // محتوای mainContent
            const mainContent = document.getElementById('mainContent');
            if (mainContent && data.content) {
                const parsed = new DOMParser().parseFromString(data.content, 'text/html');
                const newMain = parsed.body.querySelector('#mainContent');
                if (newMain) mainContent.innerHTML = newMain.innerHTML;
                else mainContent.innerHTML = data.content;
            }

            // اسکرول به بالا
            window.scrollTo(0, 0);


        })
        .catch(err => {
            console.error('SPA Load Error:', err);
            location.href = url; // در صورت خطا، انتقال کامل
        })
        .finally(() => {
            isLoading = false;
        });
}

function handleLinks() {
    document.body.addEventListener('click', function (e) {
        let target = e.target;
        while (target && target.tagName !== 'A') {
            target = target.parentElement;
        }

        if (!target || target.tagName !== 'A') return;

        const href = target.getAttribute('href');
        if (
            !href ||
            href.startsWith('#') ||
            href.startsWith('javascript:') ||
            target.hasAttribute('target') ||
            (href.startsWith('http') && !href.includes(location.hostname))
        ) return;

        e.preventDefault();
        history.pushState(null, '', href);
        sendAjax(href);
    });
}

window.addEventListener('popstate', () => {
    sendAjax(location.href);
});

document.addEventListener('DOMContentLoaded', () => {
    handleLinks();
});
