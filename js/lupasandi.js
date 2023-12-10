const forgotPasswordForm = document.getElementById('forgot-password-form');

forgotPasswordForm.addEventListener('submit', function (e) {
    e.preventDefault();

    // Mendapatkan nilai input
    const email = document.getElementById('email').value;

    // Simulasi pengiriman reset link (gantilah ini dengan logika sesungguhnya)
    const isResetLinkSent = true;

    if (isResetLinkSent) {
        // Pesan berhasil dikirim
        alert('Reset link berhasil dikirim ke alamat email Anda.');
    } else {
        // Gagal mengirim reset link
        alert('Gagal mengirim reset link. Silakan coba lagi.');
    }
});
