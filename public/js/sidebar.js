document.addEventListener('DOMContentLoaded', function () {

    const dropdowns = document.querySelectorAll('.dropdown');
    const currentPath = window.location.pathname;

    function closeAllDropdowns() {
        document.querySelectorAll('.dropdown-content')
            .forEach(c => c.classList.remove('open'));
        document.querySelectorAll('.chevron-down')
            .forEach(i => i.classList.remove('rotate-180'));
    }

    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.dropdown-btn');
        const content = dropdown.querySelector('.dropdown-content');
        const icon = btn.querySelector('.chevron-down');

        btn.addEventListener('click', function (e) {
            e.stopPropagation();

            const isOpen = content.classList.contains('open');
            closeAllDropdowns();

            if (!isOpen) {
                content.classList.add('open');
                icon.classList.add('rotate-180');
            }
        });
    });

    document.querySelectorAll('.dropdown-link').forEach(link => {
        const href = link.getAttribute('href');

        if (currentPath.startsWith(href)) {
            const parentKey = link.dataset.parent;
            const dropdown = document.querySelector(`.dropdown[data-menu="${parentKey}"]`);

            if (dropdown) {
                dropdown.querySelector('.dropdown-content').classList.add('open');
                dropdown.querySelector('.chevron-down').classList.add('rotate-180');

                link.classList.add('bg-green-100', 'text-green-600');
            }
        }
    });

    const sidebar = document.getElementById('sidebar');

    document.addEventListener('click', function (e) {

        if (!e.target.closest('#sidebar')) return;

        if (!e.target.closest('.dropdown')) {
            closeAllDropdowns();
        }
    });


    requestAnimationFrame(() => {
        document.body.classList.remove('sidebar-loading');
    });

});
