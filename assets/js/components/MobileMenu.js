const MobileMenu = () => {
    const triggerMenu = document.getElementById("toggle-mobile-menu");
    const mobileMenu = document.getElementById("mobile-menu");

    if (!triggerMenu || !mobileMenu) return;

    triggerMenu.addEventListener("click", () => {
        const mobileMenuHeight = document.getElementById("mobile-menu-inner")
            .offsetHeight;
        const activeClass = "is-active";

        // toggle active class on trigger button
        // and operate the opened/closed state of mobile menu
        triggerMenu.classList.toggle(activeClass);

        if (!mobileMenu.classList.contains(activeClass)) {
            mobileMenu.classList.add(activeClass);
            mobileMenu.style.maxHeight = `${mobileMenuHeight}px`;
        } else {
            mobileMenu.classList.remove(activeClass);
            mobileMenu.style.maxHeight = 0;
        }
    });
};

export default MobileMenu;
