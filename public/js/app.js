document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('details').forEach(function (details) {
        details.addEventListener('toggle', function () {
            if (details.open) {
                document.querySelectorAll('details').forEach(function (other) {
                    if (other !== details) {
                        other.open = false;
                    }
                });
            }
        });
    });

    const pageLayer = document.createElement('div');
    pageLayer.className = 'page-layer';
    document.body.appendChild(pageLayer);

    document.body.classList.add('page-loaded');

    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15,
    });

    revealElements.forEach(function (el) {
        el.classList.add('reveal-init');
        revealObserver.observe(el);
    });

    document.querySelectorAll('.button').forEach(function (button) {
        button.addEventListener('click', function (event) {
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = event.clientX - rect.left - size / 2 + 'px';
            ripple.style.top = event.clientY - rect.top - size / 2 + 'px';
            button.appendChild(ripple);
            window.setTimeout(function () {
                ripple.remove();
            }, 600);
        });
    });
});
