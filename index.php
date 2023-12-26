<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulir Pendaftaran Anggota Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- style css custom -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        nav ul li {
            display: inline;
            margin: 0 10px;
        }
        
        /* .success-message {
            background-color: green;
            color: white;
            border: 5px solid green;
            border-radius: 5px;
            width: 30%;
            margin: 20px auto; 
            text-align: center;
            padding: 5px;
        } */

        /* .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 5px solid #f5c6cb;
            text-align: center;
            border-radius: 5px;
            width: 30%;
            margin: 20px auto; 
            padding: 5px;
        } */

    </style>
</head>
<body class='bg-info'>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Menunggu dokumen selesai dimuat

        //     // Mengecek apakah ada notifikasi
        //     var notification = document.querySelector('.success-message, .error-message');
        //     if (notification) {
        //         // Menyembunyikan notifikasi setelah 4 detik
        //         setTimeout(function() {
        //             notification.style.display = 'none';
        //         }, 4000);
        //     }
        // });

        function showSuccessAlert() {
            Swal.fire({
                title: 'Pendaftaran Berhasil!',
                text: 'Anggota Baru Berhasil Terdaftar',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>
    <header class='bg-primary text-center text-light p-4'>
        <h3>Formulir Pendaftaran Anggota Baru Perpustakaan</h3>
        <h1>SMK Gamelab Indonesia</h1>
    </header>

    
    <nav class='p-5'>
        <ul class='text-center py-3 p-4'>
            <h4 class='text-center text-light p-4'>Menu</h4>
            <li>
                <!-- link file dari form-daftar-anggota_Tedy.php-->
                <a class="btn btn-warning" href="form-tambah-agents.php">Daftar Baru</a>
            </li>
            <li>
                <!-- link file dari list-daftar-anggota_Tedy.php -->
                <a class="btn btn-warning" href="list-daftar-agent.php">List Anggota</a>
            </li>
        </ul>
    </nav>

    <!-- mengecek apakah proses pendaftaran berhasil -->
    <?php if(isset($_GET['status'])): ?>
        <?php
            $status = $_GET['status'];
            $message = '';
            $alertClass = '';

            if($status == 'sukses'){
                // $message = 'Pendaftaran anggota baru berhasil!';
                $alertClass = 'success-message';
                echo '<script>showSuccessAlert();</script>';
            } else {
                $message = 'Pendaftaran gagal!';
                $alertClass = 'error-message';
            }
        ?>
        <div class="<?php echo $alertClass; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <!-- Bootstrap JS dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
