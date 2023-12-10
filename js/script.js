document.addEventListener("DOMContentLoaded", function () {
    // Ambil elemen header
    var header = document.querySelector("header");

    // Tambahkan event listener untuk mengikuti pengguliran
    window.addEventListener("scroll", function () {
        if (window.pageYOffset > 100) { // Atur tinggi tertentu saat header akan mengikuti
            header.classList.add("fixed-header");
        } else {
            header.classList.remove("fixed-header");
        }
    });
});

function validateForm() {
    var form = document.getElementById('donationForm');
    var isValid = form.checkValidity();

    if (isValid) {
        // Form is valid, you can proceed with form submission or other actions
        alert('Donasi berhasil! Terima kasih atas dukungan Anda.');
    } else {
        // Form is invalid, show error messages or take appropriate action
        alert('Mohon lengkapi formulir dengan benar.');
    }
}
// script.js
    const extra = document.querySelector('.extra')
    const extraicon = document.querySelector('.extra i')
    const dropdownmenu = document.querySelector('.dropdown_menu')
    
    
    extra.onclick = function () {
      dropdownmenu.classList.toggle('open')
    }
   
