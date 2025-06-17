document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggleSidebarBtn");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");

    toggleBtn.addEventListener("click", function () {
        sidebar.classList.toggle("closed");
        mainContent.classList.toggle("expanded");
    });

    const fileInput = document.getElementById("fileElemSertif");
    const linkSertif = document.getElementById("linkSertif");
    const successMsg = document.getElementById("successMsg");

    fileInput.addEventListener("change", function () {
        const file = fileInput.files[0];
        if (!file) return;

        // Contoh dummy: isi ID activity dan category secara manual di sini
        const activityId = 1; // Ganti sesuai yang relevan
        const categoryId = 2; // Ganti sesuai kategori "non-akademik"

        const formData = new FormData();
        formData.append("file", file);
        formData.append("activity_id", activityId);
        formData.append("category_id", categoryId);
        formData.append(
            "_token",
            document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        );

        fetch("/documents", {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                if (!response.ok) throw new Error("Upload gagal");
                return response.json();
            })
            .then((data) => {
                linkSertif.innerHTML = `<p>Nama file: ${file.name}</p>`;
                successMsg.style.display = "block";

                setTimeout(() => {
                    window.location.href = "/dashboard";
                }, 2000);
            })
            .catch((error) => {
                alert("Upload gagal: " + error.message);
            });
    });
});
