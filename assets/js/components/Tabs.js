const Tabs = () => {
    const tabs = document.querySelector(".tabs");
    const tabsBtns = tabs.querySelectorAll(".tabs__btn");
    const tabsContents = tabs.querySelectorAll(".tabs__content");

    function displayCurrentTab(current) {
        for (let i = 0; i < tabsContents.length; i++) {
            tabsContents[i].style.display = current === i ? "block" : "none";
        }
    }
    displayCurrentTab(0); // display first tab

    tabs.addEventListener("click", (event) => {
        if (event.target.className === "tabs__btn") {
            for (let i = 0; i < tabsBtns.length; i++) {
                if (event.target === tabsBtns[i]) {
                    displayCurrentTab(i);
                    break;
                }
            }
        }
    });
};

export default Tabs;
