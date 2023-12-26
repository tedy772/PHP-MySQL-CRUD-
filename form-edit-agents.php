<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulir Update Pendaftaran Anggota Perpusatakaan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- style css custom -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            width: 100%;
            z-index: 1000;
            top: 0;
        }

        .container {
            background-color: orange;
            border-radius: 10px;
            padding: 20px;
            margin: 120px auto 20px;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #007BFF;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
        }

        input[type=submit].center {
            width: 10%;
            display: block;
            margin: auto;
        }

        input[type=submit]:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <header>
        <h1>Formulir Update Pendaftaran Anggota Baru</h1>
    </header>

    <?php
    include("config.php");

    if (!isset($_GET['id_anggota'])) {
        // Jika tidak ada id di query string, redirect ke halaman list-daftar-anggota_Tedy.php
        header('Location: list-daftar-agent.php');
        exit();
    }

    // Ambil query string dari id
    $id = $_GET['id_anggota'];

    // Buat query untuk mengambil data dari database
    $sql = "SELECT * FROM anggota_perpustakaan WHERE id_anggota=$id";
    $query = mysqli_query($db, $sql);
    $anggota = mysqli_fetch_assoc($query);

    // Jika data yang diedit tidak ditemukan
    if (mysqli_num_rows($query) < 1) {
        die("Data tidak ditemukan...");
    }

    // Jika formulir disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {
        // Ambil data dari formulir
        $nama = mysqli_real_escape_string($db, $_POST['nama']);
        $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $asal_sekolah = mysqli_real_escape_string($db, $_POST['asal_sekolah']);

        // Buat dan jalankan query untuk menyimpan perubahan
        $queryUpdate = "UPDATE anggota_perpustakaan SET
                        nama = '$nama',
                        alamat = '$alamat',
                        jenis_kelamin = '$jenis_kelamin',
                        agama = '$agama',
                        asal_sekolah = '$asal_sekolah'
                        WHERE id_anggota = $id";

        $result = mysqli_query($db, $queryUpdate);

        // Cek apakah query berhasil dijalankan
        if ($result) {
            // Tampilkan SweetAlert konfirmasi
            echo "<script>
                    Swal.fire({
                        title: 'Perubahan Disimpan!',
                        text: 'Perubahan Berhasil Disimpan',
                        icon: 'success',
                        timer: 4000,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = 'list-daftar-agent.php';
                    });
                  </script>";
        } else {
            echo "Error: " . $queryUpdate . "<br>" . mysqli_error($db);
        }
    }
    ?>

    <div class="container text-light">
        <!-- link dari file proses-edit-anggota_Tedy.php -->
        <form action="" method="POST" id="updateForm">
            <!-- form nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $anggota['nama'] ?>" required/>
            </div>
            <!-- form alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap" required><?php echo $anggota['alamat'] ?></textarea>
            </div>
            <!-- form jenis kelamin -->
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($anggota['jenis_kelamin'] == 'Laki-laki') ? "checked": "" ?> required>
                        <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($anggota['jenis_kelamin'] == 'Perempuan') ? "checked": "" ?> required>
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>
            </div>
            <!-- form agama -->
            <div class="mb-3">
                <label for="agama" class="form-label">Agama:</label>
                <select name="agama" class="form-select" required>
                    <option value="Islam" <?php echo ($anggota['agama'] == 'Islam') ? "selected": "" ?>>Islam</option>
                    <option value="Kristen" <?php echo ($anggota['agama'] == 'Kristen') ? "selected": "" ?>>Kristen</option>
                    <option value="Hindu" <?php echo ($anggota['agama'] == 'Hindu') ? "selected": "" ?>>Hindu</option>
                    <option value="Budha" <?php echo ($anggota['agama'] == 'Budha') ? "selected": "" ?>>Budha</option>
                    <option value="Atheis" <?php echo ($anggota['agama'] == 'Atheis') ? "selected": "" ?>>Atheis</option>
                </select>
            </div>
            <!-- form sekolah -->
            <div class="mb-3">
                <label for="asal_sekolah" class="form-label">Sekolah Asal:</label>
                <input type="text" name="asal_sekolah" class="form-control" placeholder="Nama asal sekolah" value="<?php echo $anggota['asal_sekolah'] ?>" required/>
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_anggota" value="<?php echo $anggota['id_anggota'] ?>"/>
                <!-- tombol simpan -->
                <input type="submit" value="Simpan" name="simpan" class="btn btn-primary center" onclick="showConfirmation()" />
            </div>
        </form>
    </div>
    
    <!-- Bootstrap JS dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
