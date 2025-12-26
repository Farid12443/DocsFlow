function openLogoutModal() {
    const modal = document.getElementById('modalLogout');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModalLogout() {
    const modal = document.getElementById('modalLogout');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}