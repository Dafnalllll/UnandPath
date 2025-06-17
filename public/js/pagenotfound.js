document.addEventListener("DOMContentLoaded", function () {
    const btnHome = document.getElementById("btn-home");
    if (btnHome) {
        btnHome.addEventListener("click", function () {
            window.location.href = "/";
        });
    }
});
