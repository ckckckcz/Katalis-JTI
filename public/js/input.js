const inputField = document.getElementById("repeat-number");

// Menambahkan event listener untuk mendeteksi input
inputField.addEventListener("input", function (event) {
  // Menggunakan regular expression untuk menghapus karakter non-digit
  this.value = this.value.replace(/[^0-9]/g, "");
});
