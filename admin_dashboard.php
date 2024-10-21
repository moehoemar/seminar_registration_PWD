<?php
session_start();
include_once("koneksi.php");

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit;
}

$result = mysqli_query($con, "SELECT * FROM user_registration");
$jumlah_peserta = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <div class="form-container">
        <h1>Dashboard Admin</h1>
        <p>Jumlah Peserta Terdaftar: <?php echo $jumlah_peserta; ?></p>
        <table>
            <tr>
                <td><a href="lihat_peserta.php"><button name="lihat">Lihat Daftar Peserta</button></a></td>
                <td><a href="kelola_peserta.php"><button name="kelola">Kelola Daftar Peserta</button></a></td>
                <td><a href="admin_logout.php"><button name="logout">Logout</button></a></td>
            </tr>
        </table>
    </div>
</body>
</html>
