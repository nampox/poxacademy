document.addEventListener("DOMContentLoaded", function () {
    // initLogo3D();
});
function showFlashMessage(type, message) {
    const flashContainer = document.getElementById('flash-container');
    const flashMessage = document.createElement('div');
    flashMessage.className = `flash-message ${type}`;
    flashMessage.textContent = message;

    flashContainer.appendChild(flashMessage);

    setTimeout(() => {
        flashMessage.style.animation = 'fadeOut 0.5s ease forwards';
    }, 2000);

    setTimeout(() => {
        flashMessage.remove();
    }, 2500);
}
