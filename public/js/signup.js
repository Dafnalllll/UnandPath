document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("signup-form");
    const fullname = document.getElementById("fullname");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById(
        "password_confirmation"
    );
    const errorMessage = document.getElementById("error-message");

    function validatePassword(password) {
        const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
        return regex.test(password);
    }

    form.addEventListener("submit", function (e) {
        const fullName = fullname.value.trim();
        const email = emailInput.value.trim();
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (!fullName || !email || !password || !confirmPassword) {
            e.preventDefault();
            errorMessage.textContent = "Semua field wajib diisi.";
            return;
        }

        if (!validatePassword(password)) {
            e.preventDefault();
            errorMessage.textContent =
                "Password harus minimal 8 karakter, ada huruf besar dan angka.";
            return;
        }

        if (password !== confirmPassword) {
            e.preventDefault();
            errorMessage.textContent = "Konfirmasi password tidak cocok.";
            return;
        }
    });

    // Fitur toggle password (lihat/sembunyi)
    document.querySelectorAll(".toggle-password").forEach(function (eyeIcon) {
        eyeIcon.addEventListener("click", function () {
            const input = document.querySelector(this.getAttribute("toggle"));
            const icon = this.querySelector("i");
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
    });
});
