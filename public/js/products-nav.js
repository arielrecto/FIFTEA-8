document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll(".nav");

    console.log(links);

    links.forEach((nav) => {
        nav.addEventListener("click", () => {
            var currentActive = document.querySelector(".active");
            currentActive.classList.remove("active");
            nav.classList.add("active");
        });
    });
});
