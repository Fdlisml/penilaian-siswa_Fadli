const menuToggleBtn = document.querySelector(".menu-toggle-btn");
const primaryNav = document.querySelector(".primary-navigation");

menuToggleBtn.addEventListener('click', () => {
    let isNavOpen = menuToggleBtn.getAttribute('aria-expanded') === 'true';
    isNavOpen ? primaryMenuClose() : primaryMenuOpen();
})

function primaryMenuOpen() {
    menuToggleBtn.setAttribute('aria-expanded', 'true');
    primaryNav.setAttribute('data-state', 'opened');
}
function primaryMenuClose() {
    menuToggleBtn.setAttribute('aria-expanded', 'false');
    primaryNav.setAttribute('data-state', 'closing');
    primaryNav.addEventListener('animationend', () => {
        primaryNav.setAttribute('data-state', 'closed');
    }, { once: true })
}