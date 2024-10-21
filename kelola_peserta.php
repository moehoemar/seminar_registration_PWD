<?php
session_start();
include_once("koneksi.php");

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit;
}

$result = mysqli_query($con, "SELECT * FROM user_registration");

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete_query = "INSERT INTO user_was_deleted SELECT * FROM user_registration WHERE id='$id'";
    mysqli_query($con, $delete_query);
    $delete_query = "DELETE FROM user_registration WHERE id='$id'";
    mysqli_query($con, $delete_query);
    header("Location: kelola_peserta.php");
    exit();
}

if (isset($_GET['restore_id'])) {
    $id = $_GET['restore_id'];
    $restore_query = "INSERT INTO user_registration SELECT * FROM user_was_deleted WHERE id='$id'";
    mysqli_query($con, $restore_query);
    $restore_query = "DELETE FROM user_was_deleted WHERE id='$id'";
    mysqli_query($con, $restore_query);
    header("Location: kelola_peserta.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Daftar Peserta</title>
</head>
<body>
    <div class="form-container">
        <h1>Kelola Daftar Peserta</h1>
        <table width='80%' border=1>
            <tr>
                <th>NOMOR PENDAFTARAN</th>
                <th>EMAIL</th>
                <th>NAMA PESERTA</th>
                <th>INSTITUSI</th>
                <th>NEGARA</th>
                <th>ALAMAT</th>
                <th>AKSI</th>
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
                echo "<td><a href='kelola_peserta.php?delete_id=" . $user_data['id'] . "'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <h2>Data Peserta yang Dihapus</h2>
        <table width='80%' border=1>
            <tr>
                <th>NOMOR PENDAFTARAN</th>
                <th>EMAIL</th>
                <th>NAMA PESERTA</th>
                <th>INSTITUSI</th>
                <th>NEGARA</th>
                <th>ALAMAT</th>
                <th>AKSI</th>
            </tr>
            <?php
            $deleted_result = mysqli_query($con, "SELECT * FROM user_was_deleted");
            while ($deleted_data = mysqli_fetch_array($deleted_result)) {
                echo "<tr>";
                echo "<td>" . $deleted_data['id'] . "</td>";
                echo "<td>" . $deleted_data['email'] . "</td>";
                echo "<td>" . $deleted_data['nama'] . "</td>";
                echo "<td>" . $deleted_data['institusi'] . "</td>";
                echo "<td>" . $deleted_data['negara'] . "</td>";
                echo "<td>" . $deleted_data['alamat'] . "</td>";
                echo "<td><a href='kelola_peserta.php?restore_id=" . $deleted_data['id'] . "'>Kembalikan</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <a href="tambah_peserta.php"><button type="button">Tambah Peserta Baru</button></a>
        <a href="admin_dashboard.php"><button type="button">Kembali ke Dashboard</button></a>
    </div>
</body>
</html>