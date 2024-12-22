// function sendAjax(page, containerId = 'main-content') {
//         var xhttp;
//         if (window.XMLHttpRequest) {
//             xhttp = new XMLHttpRequest();
//         } else {
//             xhttp = new ActiveXObject("Microsoft.XMLHTTP");
//         }
//         xhttp.onreadystatechange = function() {
//             if (this.status === 200) {
//                 document.documentElement.innerHTML = '';
//                 window.history.pushState("object or string", "a", page);
//                 document.documentElement.innerHTML = this.responseText;
//             }
//         };
//         xhttp.open("GET", page, true);
//         xhttp.send();
//     }
//



function sendAjax(page, containerId) {
    var xhttp;
    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE) { // Check readyState as well
            if (this.status === 200) {
                if (containerId) {
                    var container = document.getElementById(containerId);
                    if (container) {
                        container.innerHTML = this.responseText;
                        window.history.pushState("object or string", "a", page);
                        var event = new CustomEvent('contentUpdated', { detail: { page: page } });
                        document.dispatchEvent(event);
                    } else {
                        console.error('Container element with ID "' + containerId + '" not found.');
                    }
                } else {
                    document.documentElement.innerHTML = ''; //Clear all
                    window.history.pushState("object or string", "a", page); //Push the page state before changing the html
                    document.documentElement.innerHTML = this.responseText;
                    var event = new CustomEvent('contentUpdated', { detail: { page: page } });
                    document.dispatchEvent(event);
                }
            } else {
                if (containerId) { // display error message if container id is set
                    var container = document.getElementById(containerId);
                    if (container) {
                        container.innerHTML = '<p>Error loading content. Please try again later.</p>';
                    } else{
                        console.error('Error loading page:', this.status);
                    }
                } else {
                    document.documentElement.innerHTML = '<p>Error loading content. Please try again later.</p>';
                    console.error('Error loading page:', this.status);
                }
            }
        }
    };

    xhttp.open("GET", page, true);
    xhttp.send();
}


    // var xhttp;
    // xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //     if (this.status === 200) {
    //         document.documentElement.innerHTML = '';
    //         window.history.pushState("object or string", "a", page);
    //         document.documentElement.innerHTML = this.responseText;
    //     }
    // };
    //



