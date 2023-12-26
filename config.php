<!-- menghubungkan database perpustakaan yang sudah dibuat sebelumnya -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";

$db = mysqli_connect($servername, $username, $password, $dbname);

// cek kondis koneksi ke database apakah sudah terhubung atau belum
if(!$db){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
echo "";
?>