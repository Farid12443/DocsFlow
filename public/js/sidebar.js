// JavaScript untuk toggle dropdown
document.addEventListener('DOMContentLoaded', function () {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector('.dropdown-btn');
        const content = dropdown.querySelector('.dropdown-content');
        const icon = btn.querySelector('.chevron-down');

        btn.addEventListener('click', function () {
            const isOpen = content.classList.contains('open');

            // Tutup semua dropdown lainnya
            document.querySelectorAll('.dropdown-content').forEach(c => c.classList.remove('open'));
            document.querySelectorAll('.chevron-down').forEach(i => i.classList.remove('rotate-180'));

            if (!isOpen) {
                content.classList.add('open');
                icon.classList.add('rotate-180');
            }
        });
    });

    // Tutup dropdown jika klik di luar
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-content').forEach(c => c.classList.remove('open'));
            document.querySelectorAll('.chevron-down').forEach(i => i.classList.remove('rotate-180'));
        }
    });
});