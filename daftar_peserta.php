<?php

include_once("koneksi.php");

$result = mysqli_query($con, "SELECT * FROM user_registration");
?>
<html>

<head>
    <title>Daftar Peserta Seminar</title>
</head>

<body>
<h2>DAFTAR PESERTA SEMINAR</h2>
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
        }
        ?>
    </table>
    <h3>SELAMAT ANDA SUDAH TERDAFTAR</h3>
    <a href="index.php"><button type="button" >Kembali ke Halaman Register</button>
</body>

</html>