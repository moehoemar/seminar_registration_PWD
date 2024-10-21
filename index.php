<?php

include_once("koneksi.php");

if (isset($_POST['Submit'])) {

    $nomor_pendaftaran = $_POST['id'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $negara = $_POST['negara'];
    $alamat = $_POST['alamat'];


    $result = mysqli_query($con, "insert into user_registration (id, email, nama, institusi, negara, alamat ) values ('$nomor_pendaftaran', '$email', '$nama', '$institusi', '$negara', '$alamat')");


    if (!isset($_SESSION['inputed'])) {
        header('Location: daftar_peserta.php');
        exit;
    }
    exit();
}
?>
<html>
<head>
    <title>Registrasi Peserta Seminar</title>
</head>
<body>
    <h2>REGISTRASI PESERTA SEMINAR</h2>
    <form action="index.php" method="post" name="form1">
        <table width="50%" border="0">
            <tr>
                <td>Nomor Pendaftaran</td>
                <td><input type="number" name="id"></td>
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
            </tr>
        </table>
        <td><input type="submit" name="Submit" value="Daftar sebagai Peserta"></td>
        <a href="admin_dashboard.php"><button type="button" >Masuk sebagai Admin</button>
</a>

    </form>
</body>
</html>
