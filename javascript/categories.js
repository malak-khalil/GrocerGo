const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
const navbar = document.getElementById('navbar');

mobileNavToggle.addEventListener('click', () => {
    const visibility = navbar.getAttribute('data-visible');
    
    if (visibility === "false") {
        navbar.setAttribute('data-visible', "true");
        mobileNavToggle.setAttribute('aria-expanded', "true");
    } else {
        navbar.setAttribute('data-visible', "false");
        mobileNavToggle.setAttribute('aria-expanded', "false");
    }
});

function toggleDropdown(button) {
    const dropdown = button.parentElement;
    dropdown.classList.toggle('active');
}

document.addEventListener('click', function(event) {
    if (!event.target.matches('.dropbtn')) {
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    }
});

        document.addEventListener("DOMContentLoaded", function() {
            const images = document.querySelectorAll(".fade-in");
            images.forEach(img => {
                if (img.complete) {
                    img.classList.add("loaded"); 
                } else {
                    img.addEventListener("load", function() {
                        img.classList.add("loaded");
                    });
                }
            });

            function revealElements() {
                document.querySelectorAll(".category-box, .feature-box, .testimonial").forEach(element => {
                    let elementPosition = element.getBoundingClientRect().top;
                    let windowHeight = window.innerHeight;
                    
                    if (elementPosition < windowHeight - 50) {
                        element.classList.add("visible");
                    }
                });
            }
            
            revealElements();
            window.addEventListener("scroll", revealElements);

            document.body.classList.add("loaded");

            document.querySelectorAll("a").forEach(link => {
                if (link.href.includes(window.location.origin) && 
                    !link.classList.contains("app-btn") && 
                    !link.classList.contains("cta-button")) {
                    link.addEventListener("click", function(e) {
                        if (this.getAttribute("target") !== "_blank" && 
                            !this.classList.contains("dropbtn") &&
                            !this.closest(".dropdown-content")) {
                            e.preventDefault();
                            document.body.classList.add("fade-out");
                            setTimeout(() => {
                                window.location.href = this.href;
                            }, 500);
                        }
                    });
                }
            });
            
            const heroSection = document.querySelector(".hero-section");
            if (heroSection) {
                setTimeout(() => {
                    heroSection.querySelector(".hero-title").classList.add("loaded");
                    heroSection.querySelector(".hero-subtitle").classList.add("loaded");
                    heroSection.querySelector(".cta-button").classList.add("loaded");
                }, 300);
            }
        });