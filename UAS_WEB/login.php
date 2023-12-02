<?php

include('koneksi.php');
session_start();

if (isset($_SESSION['username'])) {
    header('location:get.php');
} else {


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="./style/login.css">
    </head>

    <body style="background-image: url('img/background.jpg');">
        <div class="container">
            <div class="form">
                <div class="box login">
                    <h2>Sudah punya akun?</h2>
                    <button class="btnSignin">Sign In</button>
                </div>
                <div class="box register">
                    <h2>belum punya akun?</h2>
                    <button class="btnSignup">Sign Up</button>
                </div>
            </div>
            <div class="formslide">
                <div class="forms signinform">
                    <form action="" method="post">
                        <h2>SIGN IN</h2>
                        <input type="text" placeholder="Email" name="email">
                        <input type="password" placeholder="Password" name="password">
                        <input type="submit" value="login" name="masuk" id="login">
                        <?php
                        if (isset($_POST['masuk'])) {
                            $cek = mysqli_query($conn, "SELECT * FROM user  WHERE email =
                            '" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "' AND username = 'mimin'");
                            $hasil = mysqli_fetch_array($cek);
                            $masukk = mysqli_num_rows($cek);
                            @$login = $hasil['username'];
                            $cek2 = mysqli_query($conn, "SELECT * FROM user  WHERE email =
                            '" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "'");
                            $hasil2 = mysqli_fetch_array($cek2);
                            $masukk2 = mysqli_num_rows($cek2);
                            @$login2 = $hasil2['username'];
                            if ($masukk > 0) {
                                session_start();
                                $_SESSION['username'] = $login;
                                header('location:get.php');
                            } else if ($masukk2 > 0) {
                                session_start();
                                $_SESSION['username'] = $login2;
                                header('location:halaman1.php');
                            } else {
                                echo "<script> alert('Silahkan buat akun terlebih dahulu'); </script>";
                            }
                        }
                        ?>

                    </form>
                </div>
                <div class="forms signupform">
                    <form action="" method="post">
                        <h2>SIGN UP</h2>
                        <input type="text" placeholder="Username" name="username">
                        <input type="text" placeholder="Email" name="email2">
                        <input type="password" placeholder="Password" name="password2">
                        <input type="password" placeholder="Confirm Password" name="password3">
                        <input type="submit" value="register" name="register" id="login">
                        <?php
                        if (isset($_POST["register"])) {

                            $username = $_POST["username"];
                            $email = $_POST["email2"];
                            $password = $_POST["password2"];
                            $konfirmasipass = $_POST["password3"];
                            $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
                            if (mysqli_num_rows($duplicate) > 0) {
                                echo "<script> alert('Username dan email sudah digunakan!'); </script>";
                            } else {
                                if ($password == $konfirmasipass) {
                                    $query = "INSERT INTO user VALUES('', '$username', '$email', '$password')";
                                    mysqli_query($conn, $query);
                                    echo "<script> alert('Regristasi suksess'); </script>";
                                } else {
                                    echo "<script> alert('Password tidak sama'); </script>";
                                }
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const SignIn = document.querySelector('.btnSignin');
            const SignUp = document.querySelector('.btnSignup');
            const formslide = document.querySelector('.formslide');
            const body = document.querySelector('body');

            SignUp.onclick = function() {
                formslide.classList.add('active');
                body.classList.add('active')
            }
            SignIn.onclick = function() {
                formslide.classList.remove('active');
                body.classList.remove('active');
            }
        </script>
    </body>

    </html>
<?php
}
?>