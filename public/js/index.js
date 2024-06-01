document.addEventListener("DOMContentLoaded", function () {
    const btnCommentPost = [];
    const postsArray = [];
    const idPostsArray = [];
    const posts = this.querySelectorAll(".card");
    posts.forEach((post) => {
        postsArray.push(post);
        idPostsArray.push(post.getAttribute("idPost"));
        btnCommentPost.push(
            document.getElementById(
                "button-comment-post_" + post.getAttribute("idPost")
            )
        );
    });
    let textAreasPost = [];
    btnCommentPost.forEach((btn, index) => {
        let textAreaPost = "";
        textAreaPost = document.querySelector(
            `textarea[idPost='${idPostsArray[index]}']`
        );
        textAreasPost.push(textAreaPost);
        btn.addEventListener("click", function () {
            const currentRows = parseInt(textAreaPost.getAttribute("rows"));
            const newRows = currentRows === 1 ? 3 : 1;
            textAreaPost.setAttribute("rows", newRows);
            if (newRows == 1) {
                textAreaPost.blur();
            } else if (newRows == 3) {
                textAreaPost.focus();
            }
        });
    });

    const buttonToogleThemeMod = document.getElementById("theme-toogle");
    const buttonToogleDaltonism = document.getElementById("mod-toggle");
    const themeIcon = document.getElementById("moon-theme");
    const eyeIcon = document.getElementById("eye-mod");
    const buttonOptionsPostImg = document.querySelector(
        "#button-options-post img"
    );
    const buttonOptionsPost = document.querySelectorAll("#button-options-post");
    const buttonOptionsPostArray = Array.from(buttonOptionsPost);
    const converseIconPost = document.querySelector("#img-balao-conversa");

    function updateDaltonismIcon() {
        const isDaltonismo = document.body.classList.contains("daltonismo");
        const isDarkMode =
            document.body.getAttribute("data-bs-theme") === "dark";

        eyeIcon.setAttribute(
            "src",
            isDaltonismo
                ? "/img/icons/posts/icon-olho.png"
                : isDarkMode
                ? "/img/icons/posts/icon-olho-branco.png"
                : "/img/icons/posts/icon-olho.png"
        );
        themeIcon.setAttribute(
            "src",
            isDarkMode
                ? "/img/icons/posts/lua-crescente-branca.png"
                : "/img/icons/posts/lua-crescente-negra.png"
        );
    }

    function savePreferences() {
        const isDarkMode =
            document.body.getAttribute("data-bs-theme") === "dark";
        const isDaltonismo = document.body.classList.contains("daltonismo");

        localStorage.setItem("darkMode", isDarkMode);
        localStorage.setItem("daltonismo", isDaltonismo);
    }

    function loadPreferences() {
        const isDarkMode = localStorage.getItem("darkMode") === "true";
        const isDaltonismo = localStorage.getItem("daltonismo") === "true";

        if (isDarkMode) {
            document.body.setAttribute("data-bs-theme", "dark");
            themeIcon.setAttribute(
                "src",
                "/img/icons/posts/lua-crescente-branca.png"
            );

            if (converseIconPost) {
                converseIconPost.setAttribute(
                    "src",
                    "/img/icons/posts/icons8-balão-de-fala-32.png"
                );
            }
            if (buttonOptionsPostImg) {
                buttonOptionsPostImg.setAttribute(
                    "src",
                    "/img/icons/posts/icons8-três-pontos-32.png"
                );
            }

            buttonToogleThemeMod.title = "Tema claro";
        } else {
            document.body.setAttribute("data-bs-theme", "normal");
            themeIcon.setAttribute(
                "src",
                "/img/icons/posts/lua-crescente-negra.png"
            );
            if (converseIconPost) {
                converseIconPost.setAttribute(
                    "src",
                    "/img/icons/posts/icon_conversation.png"
                );
            }

            if (buttonOptionsPostImg) {
                buttonOptionsPostImg.setAttribute(
                    "src",
                    "/img/icons/posts/icons8-três-pontos-30.png"
                );
            }
            buttonToogleThemeMod.title = "Tema escuro";
        }

        if (isDaltonismo) {
            document.body.classList.add("daltonismo");
            document.querySelector("nav").classList.add("daltonismo");
            document.querySelector("footer").classList.add("daltonismo");
            document.querySelectorAll("a").forEach(function (link) {
                link.classList.add("daltonismo");
            });
            if (converseIconPost) {
                converseIconPost.setAttribute(
                    "src",
                    "/img/icons/posts/icon_conversation.png"
                );
            }
        }

        updateDaltonismIcon();
    }

    let optionsPost = idPostsArray.reduce((acc, id) => {
        const nodeList = document.querySelectorAll(
            `#display-options-post_${id}`
        );
        return acc.concat(Array.from(nodeList));
    }, []);

    function showDisplayPostOptions(event) {
        const clickedButton = event.currentTarget;

        const postId = clickedButton.getAttribute("data-post-id");
        const optionDiv = document.querySelector(
            `#display-options-post_${postId}`
        );

        if (
            optionDiv.style.display === "none" ||
            optionDiv.style.display === ""
        ) {
            optionDiv.style.display = "block";
        } else {
            optionDiv.style.display = "none";
        }
    }

    buttonOptionsPostArray.forEach((btn) => {
        const postId = btn
            .closest("span")
            .nextElementSibling.getAttribute("id")
            .split("_")[1];
        btn.setAttribute("data-post-id", postId);

        btn.addEventListener("click", showDisplayPostOptions);
    });

    function toggleTheme() {
        buttonToogleThemeMod.addEventListener("click", function () {
            const isDarkMode =
                document.body.getAttribute("data-bs-theme") === "dark";
            if (buttonOptionsPostImg) {
                buttonOptionsPostImg.setAttribute(
                    "src",
                    "/img/icons/posts/icons8-três-pontos-30.png"
                );
            }

            if (isDarkMode) {
                document.body.setAttribute("data-bs-theme", "normal");
                themeIcon.setAttribute(
                    "src",
                    "/img/icons/posts/lua-crescente-negra.png"
                );
                eyeIcon.setAttribute("src", "/img/icons/posts/icon-olho.png");
                if (converseIconPost) {
                    converseIconPost.setAttribute(
                        "src",
                        "/img/icons/posts/icon_conversation.png"
                    );
                }

                if (buttonOptionsPostImg) {
                    buttonOptionsPostImg.setAttribute(
                        "src",
                        "/img/icons/posts/icons8-três-pontos-30.png"
                    );
                }
                buttonToogleThemeMod.title = "Tema escuro";
            } else {
                if (document.body.classList.contains("daltonismo")) {
                    document.body.classList.remove("daltonismo");
                    document
                        .querySelector("nav")
                        .classList.remove("daltonismo");
                    document
                        .querySelector("footer")
                        .classList.remove("daltonismo");
                    document.querySelectorAll("a").forEach(function (link) {
                        link.classList.remove("daltonismo");
                    });
                }
                if (converseIconPost) {
                    converseIconPost.setAttribute(
                        "src",
                        "/img/icons/posts/icons8-balão-de-fala-32.png"
                    );
                }
                document.body.setAttribute("data-bs-theme", "dark");
                if (buttonOptionsPostImg) {
                    buttonOptionsPostImg.setAttribute(
                        "src",
                        "/img/icons/posts/icons8-três-pontos-32.png"
                    );
                }

                buttonToogleThemeMod.title = "Tema claro";
            }
            updateDaltonismIcon();
            savePreferences();
        });
    }

    function toggleDaltonism() {
        buttonToogleDaltonism.addEventListener("click", function () {
            const isDarkMode =
                document.body.getAttribute("data-bs-theme") === "dark";
            if (isDarkMode) {
                alert(
                    "Desative o Tema escuro antes de ativar o modo daltonismo."
                );
                return;
            }
            eyeIcon.classList.toggle("activedButtons");
            const isDaltonismo = document.body.classList.toggle("daltonismo");
            buttonToogleDaltonism.title = isDaltonismo
                ? "Desativar modo daltonismo"
                : "Modo daltonismo";

            document.querySelector("nav").classList.toggle("daltonismo");
            document.querySelector("footer").classList.toggle("daltonismo");
            document.querySelectorAll("a").forEach(function (link) {
                link.classList.toggle("daltonismo");
            });
            if (converseIconPost) {
                converseIconPost.setAttribute(
                    "src",
                    "/img/icons/posts/icon_conversation.png"
                );
            }

            updateDaltonismIcon();
            savePreferences();
        });
    }

    loadPreferences();
    toggleTheme();
    toggleDaltonism();
    updateDaltonismIcon();
});
