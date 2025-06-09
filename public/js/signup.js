document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("signup-form");
    const fullname = document.getElementById("fullname");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const errorMessage = document.getElementById("error-message");

    function validatePassword(password) {
        const regex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
        return regex.test(password);
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const fullName = fullname.value.trim();
        const email = emailInput.value.trim();
        const password = passwordInput.value;

        if (!fullName || !email || !password) {
            errorMessage.textContent = "Semua field wajib diisi.";
            return;
        }

        if (!validatePassword(password)) {
            errorMessage.textContent =
                "Password harus minimal 8 karakter, ada huruf besar dan angka.";
            return;
        }

        // Simulasi penyimpanan akun (dummy)
        localStorage.setItem(
            "user",
            JSON.stringify({ fullName, email, password })
        );

        alert("Signup berhasil! Silakan login.");
        window.location.href = "/login"; // Pastikan login.html ada di folder yg benar
    });
});
