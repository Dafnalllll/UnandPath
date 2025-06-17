document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("login-form");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const errorMessage = document.getElementById("error-message");

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const email = emailInput.value.trim();
        const password = passwordInput.value;

        // ✅ Tambahkan validasi input kosong
        if (!email || !password) {
            errorMessage.textContent =
                "Harap isi email dan password terlebih dahulu.";
            errorMessage.style.display = "block";
            return;
        }

        try {
            const response = await fetch("/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    Accept: "application/json",
                },
                body: JSON.stringify({ email, password }),
            });

            const data = await response.json();

            if (response.ok && data.success) {
                window.location.href = data.redirect;
            } else {
                errorMessage.textContent = data.message || "Login gagal.";
                errorMessage.style.display = "block";
            }
        } catch (err) {
            console.error("Login error:", err);
            errorMessage.textContent = "Terjadi kesalahan saat login.";
            errorMessage.style.display = "block";
        }
    });
});
