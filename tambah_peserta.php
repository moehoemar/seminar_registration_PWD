<?php
session_start();
include_once("koneksi.php");

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit;
}

if (isset($_POST['Submit'])) {
    $nomor_pendaftaran = $_POST['nim'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $negara = $_POST['negara'];
    $alamat = $_POST['alamat'];

    $result = mysqli_query($con, "INSERT INTO user_registration (id, email, nama, institusi, negara, alamat) VALUES ('$nomor_pendaftaran', '$email', '$nama', '$institusi', '$negara', '$alamat')");
    if ($result) {
        header("Location: kelola_peserta.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peserta Baru</title>
</head>
<body>
    <h2>Tambah Peserta Baru</h2>
    <form action="tambah_peserta.php" method="post" name="form1">
        <table width="50%" border="0">
            <tr>
                <td>Nomor Pendaftaran</td>
                <td><input type="number" name="nim"></td>
            </tr>
            <tr>
                <td>Email Peserta</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Nama Peserta</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Institusi</td>
                <td><input type="text" name="institusi"></td>
            </tr>
            <tr>
                <td>Negara</td>
                <td><input type="text" name="negara"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <a href="kelola_peserta.php"><button type="button">Kembali ke Daftar Peserta</button></a>
</body>
</html>
