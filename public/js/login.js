document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("login-form");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const errorMessage = document.getElementById("error-message");

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const email = emailInput.value.trim();
        const password = passwordInput.value;

        try {
            const response = await fetch("/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify({ email, password }),
            });

            if (response.redirected) {
                window.location.href = response.url; // Redirect ke dashboard
            } else {
                const text = await response.text();
                errorMessage.textContent = "Email atau password salah.";
                errorMessage.style.display = "block";
            }
        } catch (err) {
            console.error("Login error:", err);
            errorMessage.textContent = "Terjadi kesalahan saat login.";
            errorMessage.style.display = "block";
        }
    });
});
