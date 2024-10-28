document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.querySelector("aside");
    const maxSidebar = document.querySelector(".max");
    const miniSidebar = document.querySelector(".mini");
    const roundout = document.querySelector(".roundout");
    const maxToolbar = document.querySelector(".max-toolbar");
    const logo = document.querySelector(".logo");
    const content = document.querySelector(".content");
    const moon = document.querySelector(".moon");
    const sun = document.querySelector(".sun");

    window.setDark = function(val) {
        if (val === "dark") {
            document.documentElement.classList.add("dark");
            moon.classList.add("hidden");
            sun.classList.remove("hidden");
        } else {
            document.documentElement.classList.remove("dark");
            sun.classList.add("hidden");
            moon.classList.remove("hidden");
        }
    };

    window.openNav = function() {
        if (sidebar.classList.contains("-translate-x-48")) {
            sidebar.classList.remove("-translate-x-48");
            sidebar.classList.add("translate-x-none");
            maxSidebar.classList.remove("hidden");
            maxSidebar.classList.add("flex");
            miniSidebar.classList.remove("flex");
            miniSidebar.classList.add("hidden");
            maxToolbar.classList.add("translate-x-0");
            maxToolbar.classList.remove("translate-x-24", "scale-x-0");
            logo.classList.remove("ml-12");
            content.classList.remove("ml-12");
            content.classList.add("ml-12", "md:ml-60");
        } else {
            sidebar.classList.add("-translate-x-48");
            sidebar.classList.remove("translate-x-none");
            maxSidebar.classList.add("hidden");
            maxSidebar.classList.remove("flex");
            miniSidebar.classList.add("flex");
            miniSidebar.classList.remove("hidden");
            maxToolbar.classList.add("translate-x-24", "scale-x-0");
            maxToolbar.classList.remove("translate-x-0");
            logo.classList.add("ml-12");
            content.classList.remove("ml-12", "md:ml-60");
            content.classList.add("ml-12");
        }
    };
});
