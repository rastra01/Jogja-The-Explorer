<?php
require 'function.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query SQL untuk memeriksa apakah username dan password cocok
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    

    if( mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            header("Location: dashbord.php");
            exit;
        }
    }

    $eror = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/slog.css">
    <script src="dada.js"></script>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>Login Admin</h1>
            <?php if( isset($eror)) : ?>
                <p style="color : red; font-style:  italic;">username / password salah</p>
                <?php endif; ?>
            <form id="login-form" method="post" action="">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button class="button" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
