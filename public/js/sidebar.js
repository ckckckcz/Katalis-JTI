// Ambil elemen tombol dan background
const sidebarToggle = document.getElementById("sidebar-toggle");
const sidebarBackground = document.getElementById("sidebarBackground");

// Tambahkan event listener untuk toggle
sidebarToggle.addEventListener("click", () => {
    // Toggle kelas hidden pada background
    sidebarBackground.classList.toggle("hidden");
});

// Tambahkan event listener untuk menyembunyikan background saat diklik
sidebarBackground.addEventListener("click", () => {
    sidebarBackground.classList.add("hidden");
});
