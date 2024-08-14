document.addEventListener("DOMContentLoaded", function () {
  // Event listener untuk paket dropdown
  document.getElementById("paket").addEventListener("change", calculatePrice);

  // Event listener untuk checkbox layanan tambahan
  document.querySelectorAll(".layanan").forEach(function (checkbox) {
    checkbox.addEventListener("change", calculatePrice);
  });

  function calculatePrice() {
    // Mengambil harga paket dari atribut data-harga paket yang dipilih
    let selectedOption = document.getElementById("paket").selectedOptions[0];
    let hargaPaket = parseInt(selectedOption.getAttribute("data-harga"));

    // set ulang value harga
    document.getElementById("harga").value = hargaPaket;

    // Menghitung total harga berdasarkan layanan tambahan yang dipilih
    document.querySelectorAll(".layanan:checked").forEach(function (checkbox) {
      hargaPaket += parseInt(checkbox.value);
    });

    // Setel nilai total harga ke dalam input form
    document.getElementById("total").value = hargaPaket;
  }

  // Inisialisasi harga saat halaman pertama kali dimuat
  calculatePrice();
});
