// Reina Najjar

const navBar = document.querySelector(".navbar");
const navToggle = document.querySelector(".mobile-nav-toggle");

// toggling the navigation menu in smaller screens
navToggle.addEventListener("click", () => {
    const visibility = navBar.getAttribute("data-visible");

    if (visibility === "false") {
        navBar.setAttribute("data-visible", "true");
        navToggle.innerHTML = `<i class="bi bi-x nav-button"></i>`;
    } else {
        navBar.setAttribute("data-visible", "false");
        navToggle.innerHTML = `<i class="bi bi-list nav-button"></i>`;
    }
});

// toggling the dropdown for categories
function getCategories() {
    document.querySelector(".dropdown-content").classList.toggle("show");
};

