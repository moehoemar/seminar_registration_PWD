<?php
session_start();
include_once("koneksi.php");

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit;
}

$result = mysqli_query($con, "SELECT * FROM user_registration");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Daftar Peserta</title>
</head>
<body>
    <div class="form-container">
        <h1>Daftar Peserta Seminar</h1>
        <table width='80%' border=1>
            <tr>
                <th>NOMOR PENDAFTARAN</th>
                <th>EMAIL</th>
                <th>NAMA PESERTA</th>
                <th>INSTITUSI</th>
                <th>NEGARA</th>
                <th>ALAMAT</th>
            </tr>
            <?php
            while ($user_data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $user_data['id'] . "</td>";
                echo "<td>" . $user_data['email'] . "</td>";
                echo "<td>" . $user_data['nama'] . "</td>";
                echo "<td>" . $user_data['institusi'] . "</td>";
                echo "<td>" . $user_data['negara'] . "</td>";
                echo "<td>" . $user_data['alamat'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <a href="admin_dashboard.php"><button type="button">Kembali ke Dashboard</button></a>
    </div>
</body>
</html>
