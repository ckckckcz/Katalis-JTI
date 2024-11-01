<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($title) ? $title : 'Katalis'; ?></title>
    <?php
    $currentFile = basename($filePath);

    if ($currentFile === 'Login.php' || $currentFile === 'Register.php' || $currentFile === 'Premium.php') {
        echo '<link rel="stylesheet" href="/katalis/public/styles/globalAuth.css">';
    } elseif ($currentFile === 'Admin.php') {
        echo '<link rel="stylesheet" href="/katalis/public/styles/globalAdmin.css">';
    } else {
        echo '<link rel="stylesheet" href="/katalis/public/styles/global.css">';
    }

    ?>
    <link rel="stylesheet" href="/katalis/public/styles/font.css">
    <link rel="stylesheet" href="/katalis/public/styles/Navbar.css">
    <link rel="stylesheet" href="/katalis/public/styles/Footer.css">
    <link rel="stylesheet" href="/katalis/public/styles/Home.css">
    <link rel="stylesheet" href="/katalis/public/styles/Blog.css">
    <link rel="stylesheet" href="/katalis/public/styles/Stats.css">
    <link rel="stylesheet" href="/katalis/public/styles/About.css">
    <!-- Auth -->
    <link rel="stylesheet" href="/katalis/public/styles/auth/Login.css">
    <!-- Admin  -->
    <link rel="stylesheet" href="/katalis/public/styles/admin/Sidebar.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/components/Cards.css">
    <link rel="stylesheet" href="/katalis/public/styles/admin/components/Prestasi.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    // Menampilkan Navbar jika bukan halaman Login, Daftar, atau Admin
    if ($currentFile !== 'Login.php' && $currentFile !== 'Register.php' && $currentFile !== 'Admin.php') {
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
    if ($currentFile !== 'Login.php' && $currentFile !== 'Register.php' && $currentFile !== 'Admin.php') {
        include('./client/components/Footer.php');
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/katalis/public/js/input.js"></script>
    <script src="/katalis/public/js/stepper.js"></script>
</body>

</html>