document.addEventListener(
    "DOMContentLoaded", () => {
        new Mmenu( ".mobile-nav", {
            "slidingSubmenus": false,
            "extensions": [
                "pagedim-black",
                "theme-dark"
            ],
            "iconbar": {
                "use": true,
                "top": [
                    "<a href='#/'>1</a>",
                    "<a href='#/'>2</a>"
                ],
                "bottom": [
                    "<a href='#/'>3</a>",
                    "<a href='#/'>3</i></a>",
                    "<a href='#/'>3</a>"
                ]
            }
        });
    }
);