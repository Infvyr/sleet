import MobileMenu from "./components/MobileMenu";
import Tabs from "./components/Tabs";

window.addEventListener("DOMContentLoaded", () => {
    try {
        MobileMenu();
        Tabs();
    } catch (error) {
        console.log(error);
    }
});
