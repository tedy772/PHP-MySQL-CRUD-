<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota Perpustakaan Baru</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    
    <!-- Style CSS custom -->
    <style>
        .anggota {
            font-family: Arial, Helvectica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
    </style>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    
    <!-- Skrip JavaScript -->
    <script>
        // Fungsi untuk menampilkan SweetAlert konfirmasi penghapusan
        function confirmDelete(id_anggota) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman hapus-anggota_Tedy.php dengan menyertakan parameter id_anggota
                    window.location.href = 'hapus-agents.php?id_anggota=' + id_anggota;
                }
            });
        }
    </script>
</head>
<body class='bg-info'>
    <div class="container-fluid mt-4">
        <!-- Header -->
        <header class="text-center">
            <h1 class='bg-primary p-2 rounded text-light'>Daftar anggota Perpustakaan yang sudah mendaftar</h1>
        </header>

        <div class="d-flex justify-content-between align-items-center">
            <!-- Tombol Tambah Anggota -->
            <a class='btn btn-success p-2 rounded ' href="form-tambah-agents.php">[+] Tambah Anggota</a>
            
            <!-- Jumlah Anggota -->
            <?php
            $sql = "SELECT * FROM anggota_perpustakaan";
            $query = mysqli_query($db, $sql);

            if ($query) {
                echo "<h5 class='mt-4 text-decoration-none'><span class='bg-secondary text-white p-2 rounded'>Total: " . mysqli_num_rows($query) . " Anggota Baru</span></h5>";
            } else {
                echo "<span>Total: 0 Anggota Baru</span>";
            }
            ?>
        </div>

        <br>

        <!-- Tabel Anggota -->
        <table class="table table-bordered anggota">
            <thead>
                <tr>
                    <th class='bg-primary text-white text-center p-3'>No</th>
                    <th class='bg-primary text-white text-center p-3'>Nama Lengkap</th>
                    <th class='bg-primary text-white text-center p-3'>Alamat Lengkap</th>
                    <th class='bg-primary text-white text-center p-3'>Jenis Kelamin</th>
                    <th class='bg-primary text-white text-center p-3'>Agama</th>
                    <th class='bg-primary text-white text-center p-3'>Asal Sekolah</th>
                    <th class='bg-warning text-white text-center p-3'>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan tabel anggota perpustakaan dalam database dengan PHP -->
                <?php
                $sql = "SELECT * FROM anggota_perpustakaan";
                $query = mysqli_query($db, $sql);

                while ($anggota = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td class='text-center p-3'>" . $anggota['id_anggota'] . "</td>";
                    echo "<td class='text-center py-3'>" . $anggota['nama'] . "</td>";
                    echo "<td class='text-center py-3'>" . $anggota['alamat'] . "</td>";
                    echo "<td class='text-center py-3'>" . $anggota['jenis_kelamin'] . "</td>";
                    echo "<td class='text-center py-3'>" . $anggota['agama'] . "</td>";
                    echo "<td class='text-center py-3'>" . $anggota['asal_sekolah'] . "</td>";
                    echo "<td class='text-center'>";
                    
                    // Tombol Edit
                    echo "<a class='btn btn-primary mx-1' href='form-edit-agents.php?id_anggota=".$anggota['id_anggota']."'><i class='fas fa-edit'></i> Update</a>";
                    
                    // Tombol Delete dengan memanggil fungsi confirmDelete
                    echo "<a class='btn btn-danger mx-1' onclick='confirmDelete(".$anggota['id_anggota'].")'><i class='fas fa-trash'></i> Delete</a>";
                    
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- Bootstrap JS dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
