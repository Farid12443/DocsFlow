function openHapusDokumen() {
    const modal = document.getElementById('modalHapusDokumen');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModalHapusDokumen() {
    const modal = document.getElementById('modalHapusDokumen');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}