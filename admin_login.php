<?php
session_start();
include_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    if ($username == 'admin' && $password == 'admin') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
</head>
<body>
    <div class="form-container">
        <h2>Login sebagai Admin</h2>
        <form action="admin_login.php" method="POST">
        <div class="form-group">
            <table width="60%">
                <tr>
                    <td><input type="text" name="username" placeholder="username" required></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="password" required></td>
                </tr>
            </table>
            <div class="button-group">
                <button name="submit" type="submit" >MASUK</button>
                <a href="index.php"><button type="button" >KEMBALI</button>
            </div>
        </form>
    </div>
</body>
</html>
