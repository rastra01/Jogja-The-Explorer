document.addEventListener("DOMContentLoaded", function () {
    // Animasi efek masuk pada elemen dengan kelas .donation-content
    anime({
        targets: '.donation-content',
        opacity: 1,
        translateY: [-50, 0],
        duration: 1000,
        easing: 'easeInOutQuad'
    });

    // Animasi efek masuk pada elemen dengan kelas .donation-form
    anime({
        targets: '.donation-form',
        opacity: 1,
        translateY: [50, 0],
        duration: 1000,
        easing: 'easeInOutQuad',
        delay: 500 // Menunda animasi agar muncul setelah animasi .donation-content
    });

    // Animasi tambahan pada tombol "Donasi Sekarang"
    var donateButton = document.querySelector('button');
    donateButton.addEventListener('mouseenter', function () {
        anime({
            targets: donateButton,
            scale: 1.1,
            duration: 300,
            easing: 'easeInOutQuad'
        });
    });
    donateButton.addEventListener('mouseleave', function () {
        anime({
            targets: donateButton,
            scale: 1,
            duration: 300,
            easing: 'easeInOutQuad'
        });
    });

    // Efek paralaks pada latar belakang
    var background = document.querySelector('body');
    window.addEventListener('scroll', function () {
        var yPos = -window.scrollY / 2;
        anime({
            targets: background,
            backgroundPositionY: yPos + 'px',
            duration: 500,
            easing: 'easeInOutQuad'
        });
    });
});


