<?php
require 'function.php';

if (isset($_POST["register"])) {

    if(registrasi($_POST) > 0) {
        echo "<script>
              alert('user baru berhasil ditambahkan!');
              </script>";
    } else {
        echo mysqli_error($conn);
    }

}

?>
    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Page</title>
    <link rel="stylesheet" type="text/css" href="css/stylelog.css">
    <script src="dada.js"></script>
</head>
<body>
    <header>
        <div class="container1">
            <nav>
                <ul>
                    <li><a href="coba.html">Home</a></li>
                </ul>
            </nav>
            <div class="extra">
                <!-- <a href="login.html">Sign In</a> -->
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="dropdown_menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#destinations">Destinasi</a></li>
                <li><a href="#tours">Aksi</a></li>
                <li><a href="#Tentang"> Tentang</a></li>
                <li><a href="Donasi.html">Donasi</a></li>
                <li class="signin-btn"><a href="login.html">Sign In</a></li>
            </div>
        </div>
    </header>
    <script>
        const extra = document.querySelector('.extra')
        const extraicon = document.querySelector('.extra i')
        const dropdownmenu = document.querySelector('.dropdown_menu')
        
        extra.onclick = function () {
          dropdownmenu.classList.toggle('open')
          const isOpen = dropdownmenu.classList.contains('open')
    
          extraicon.classList = isOpen
            ? 'fa-solid fa-xmark'
            : 'fa-solid fa-bars'
        }
    </script>
    
    <div class="container">
        <div class="login-box">
            <h1>signin Admin</h1>
            <?php if( isset($eror)) : ?>
                <p style="color : red; font-style:  italic;">username / password salah</p>
                <?php endif; ?>
            <form id="login-form" method="post" action="">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="password" name="password2" placeholder="Password" required>
                <button class="button" type="submit" name="register">Register</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
