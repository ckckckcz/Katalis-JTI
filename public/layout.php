<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($title) ? $title : 'Katalis'; ?></title>
    <?php
    $currentFile = basename($filePath);

    if ($currentFile === 'Login.php' || $currentFile === 'Register.php' || $currentFile === 'Forgot.php') {
        echo '<link rel="stylesheet" href="/katalis/public/styles/globalAuth.css">';
    } elseif ($currentFile === 'Admin.php' || $currentFile != 'Kegiatan.php' || $currentFile != 'Prestasi.php' || $currentFile != 'Export.php' || $currentFile != 'Mahasiswa.php' || $currentFile != 'Tambah_Kegiatan.php' || $currentFile != 'Tambah_Prestasi.php' || $currentFile != 'Dashboard.php' || $currentFile != 'Berita.php' || $currentFile != 'Tambah_Berita.php' || $currentFile != 'detailBlog.php') {
        echo '<link rel="stylesheet" href="/katalis/public/styles/globalAdmin.css">';
    } else {
        echo '<link rel="stylesheet" href="/katalis/public/styles/global.css">';
    }

    ?>
    <link rel="stylesheet" href="/katalis/public/styles/font.css">
    <link rel="stylesheet" href="/katalis/public/styles/Navbar.css">
    <link rel="stylesheet" href="/katalis/public/styles/Footer.css">
    <link rel="stylesheet" href="/katalis/public/styles/Home.css">
    <link rel="stylesheet" href="/katalis/public/styles/Leaderboard.css">
    <link rel="stylesheet" href="/katalis/public/styles/Blog.css">
    <link rel="stylesheet" href="/katalis/public/styles/Stats.css">
    <link rel="stylesheet" href="/katalis/public/styles/About.css">
    <link rel="stylesheet" href="/katalis/public/styles/Podium.css">
    <link rel="stylesheet" href="/katalis/public/styles/Competition.css">
    <!-- Auth -->
    <link rel="stylesheet" href="/katalis/public/styles/auth/Login.css">
    <!-- Admin  -->
    <link rel="stylesheet" href="/katalis/public/styles/admin/Sidebar.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/components/Cards.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/components/Prestasi.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/components/Mahasiswa.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/components/TabelPrestasi.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/Admin.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/Prestasi.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/Berita.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/Kegiatan.css">
    <!-- User -->
     <link rel="stylesheet" href="/katalis/public/styles/user/User.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/charts/chart-1/assets/css/chart-1.css">
</head>

<body>
    <?php
    // Menampilkan Navbar jika bukan halaman Login, Daftar, atau Admin
    if ($currentFile !== 'Login.php' && $currentFile !== 'Register.php' && $currentFile !== 'Forgot.php' && $currentFile !== 'Admin.php' && $currentFile != 'Kegiatan.php' && $currentFile != 'Export.php' && $currentFile != 'Mahasiswa.php' && $currentFile != 'Prestasi.php' && $currentFile != 'Tambah_Kegiatan.php' && $currentFile != 'Tambah_Prestasi.php' && $currentFile != 'Dashboard.php' && $currentFile != 'Berita.php' &&  $currentFile != 'Tambah_Berita.php' && $currentFile != 'detailBlog.php') {
        include('./client/components/Navbar.php');
    }
    ?>

    <div id="content">
        <?php
        // Memasukkan file konten yang sesuai jika file tersebut ada
        if (file_exists($filePath)) {
            include($filePath);
        }
        ?>
    </div>

    <?php
    // Menampilkan Footer jika bukan halaman Login, Register, atau Admin
    if ($currentFile !== 'Login.php' && $currentFile !== 'Register.php' && $currentFile !== 'Forgot.php' && $currentFile !== 'Admin.php' && $currentFile != 'Kegiatan.php' && $currentFile != 'Export.php' && $currentFile != 'Mahasiswa.php' && $currentFile != 'Prestasi.php' && $currentFile != 'Tambah_Kegiatan.php' && $currentFile != 'Tambah_Prestasi.php' && $currentFile != 'Dashboard.php' && $currentFile != 'Berita.php' &&  $currentFile != 'Tambah_Berita.php' && $currentFile != 'detailBlog.php' ) {
        include('./client/components/Footer.php');
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/katalis/public/js/input.js"></script>
    <script src="/katalis/public/js/sidebar.js"></script>
    <script src="/katalis/public/js/validasi.js"></script>
    <script src="/katalis/public/js/stepper.js"></script>
    <script src="/katalis/public/js/statusMahasiswa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php include("./public/js/Lokasi.php"); ?>
</body>

</html>