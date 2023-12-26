<?php
include("config.php");

// cek apakah tombol sudah diklik atau belum?
if(isset($_POST['simpan'])){
    // ambil data dari formulir
    $id = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['asal_sekolah'];

    // buat query untuk mengupdate data pada tabel database
    $sql = "UPDATE anggota_perpustakaan SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', asal_sekolah='$sekolah' WHERE id_anggota=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil disimpan ?
    if($query) {
        // kalau berhsil alihkan ke halaman index_Tedy.php dengan status=sukses
        header('Location: list-daftar-agent.php');
    }else{
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan");
    }

}else{
    die(" Akses dialarang..........");
}
?>