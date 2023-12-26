<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulir Pendaftaran Anggota Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            margin:  auto;
        }

        input[type=submit]:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <header>
        <h1>Formulir Pendaftaran Anggota Baru</h1>
    </header>

    <div class="container text-light">
        <!-- link dari file proses-tambah-anggota_Tedy.php  -->
        <form action="proses-tambah-agents.php" method="POST">
            <!-- form nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required/>
            </div>
            <!-- form alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap" required></textarea>
            </div>
            <!-- form jenis kelamin -->
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" required>
                        <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" required>
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>
            </div>
            <!-- form agama -->
            <div class="mb-3">
                <label for="agama" class="form-label">Agama:</label>
                <select name="agama" class="form-select" required>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Atheis">Atheis</option>
                </select>
            </div>
            <!-- form sekolah -->
            <div class="mb-3">
                <label for="asal_sekolah" class="form-label">Sekolah Asal:</label>
                <input type="text" name="asal_sekolah" class="form-control" placeholder="Nama asal sekolah" required/>
            </div>
            <!-- tombol submit -->
            <div class="mb-3">
                <input type="submit" value="Daftar" name="daftar" class="btn btn-primary center"/>
            </div>
        </form>
    </div>
    
    <!-- Bootstrap JS dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
