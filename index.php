<?php
include 'config.php';
error_reporting(0);

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="src/icon/logo.png" rel="icon">
    <link href="src/icon/logo.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Nur Rizky Romadhon</title>
</head>

<body style="background-color: #B9E9FC;">

    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12 bg-light p-5 mt-5">
                    <div class="header d-flex justify-content-center">
                        <h2>Login</h2><br>
                    </div>
                    <?php
                    if (isset($_SESSION['username'])) {
                        header("Location: home.php");
                    }

                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);

                        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                        $result = mysqli_query($koneksi, $sql);
                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['username'] = $row['username'];
                            header("Location: home.php");
                        } else {
                            echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
                        }
                    }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required autofocus>
                        </div><br>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div><br>
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Login">
                    </form><br>
                    <h5 class="login-register-text">Anda belum punya akun? <a href="register.php" class="text-decoration-none">Register</a></h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>