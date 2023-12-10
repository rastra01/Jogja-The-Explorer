const signupForm = document.getElementById('signup-form');
const registrationSuccessDiv = document.getElementById('registration-success');

signupForm.addEventListener('submit', function (e) {
    e.preventDefault();

    // Mendapatkan nilai input
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Simulasi pendaftaran (gantilah ini dengan logika pendaftaran sesungguhnya)
    const isRegistrationSuccessful = true;

    if (isRegistrationSuccessful) {
        // Pendaftaran berhasil
        gsap.to(registrationSuccessDiv, { duration: 0.5, opacity: 1, display: 'block' });
        gsap.from(registrationSuccessDiv, { duration: 0.5, y: -20, ease: 'power2.out' });
    } else {
        // Pendaftaran gagal
        alert('Pendaftaran gagal. Silakan coba lagi.');
    }
});
