// DOM Content Loaded Event
document.addEventListener("DOMContentLoaded", function () {
    // Hide loader after 2 seconds
    setTimeout(function () {
        const loader = document.getElementById("pageLoader");
        if (loader) {
            loader.style.display = "none";
        }
    }, 2000);

    // Initialize AOS
    AOS.init({
        duration: 1200,
        easing: "ease-out-back",
        once: true,
        mirror: false,
        offset: 20,
        delay: 0,
        anchorPlacement: "top-bottom",
        startEvent: "DOMContentLoaded",
        animatedClassName: "aos-animate",
        initClassName: "aos-init",
        disable: function () {
            var maxWidth = 768;
            return window.innerWidth < maxWidth;
        },
    });
});

// Get Started Form Event
document
    .getElementById("getstarted-form")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        window.location.href = "/login";
    });

// Add extra animations on scroll
window.addEventListener("scroll", function () {
    const banner = document.querySelector(".UnandPath-banner");
    const container = document.querySelector(".getstarted-container");

    if (window.scrollY > 50) {
        banner.style.transform = "translateY(-10px)";
        container.style.transform = "translateY(10px)";
    } else {
        banner.style.transform = "translateY(0)";
        container.style.transform = "translateY(0)";
    }
});
