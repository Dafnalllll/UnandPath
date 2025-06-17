document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("toggleSidebarBtn");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");
    const addButton = document.getElementById("addKegiatanBtn");

    // Jangan buka otomatis di layar kecil
    if (window.innerWidth <= 768) {
        sidebar.classList.add("closed");
        mainContent.classList.add("expanded");
    }

    // Tombol toggle sidebar
    if (toggleBtn && sidebar && mainContent) {
        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("closed");
            sidebar.classList.toggle("open");
            mainContent.classList.toggle("expanded");
        });
    }

    // Navigasi tombol tambah kegiatan
    if (addButton) {
        addButton.addEventListener("click", () => {
            window.location.href = "/data";
        });
    }
});
