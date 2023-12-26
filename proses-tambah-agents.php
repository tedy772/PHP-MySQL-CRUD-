<?php
// link dari file config_Tedy.php
include("config.php");

// cek apakah tombol daftar sudah diklik atau belum?
if(isset($_POST['daftar'])){
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['asal_sekolah'];

    // buat query untuk menambahkan
    $sql = "INSERT INTO anggota_perpustakaan (nama, alamat, jenis_kelamin, agama, asal_sekolah) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah')";
    $query = mysqli_query($db, $sql);

    // apakah query berhasil disimpan ?
    if($query) {
        // kalau berhsil alihkan ke halaman index_Tedy.php dengan status=sukses
        header('Location: index.php?status=sukses');
    }else{
        // kalau gagal alihkan ke halaman index_Tedy.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }

}else{
    die(" Akses dialarang..........");
}
?>