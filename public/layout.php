<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($title) ? $title : 'Grit & Grind'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/UTS/public/styles/global.css">
    <link rel="stylesheet" href="/UTS/public/styles/Navbar.css">
    <link rel="stylesheet" href="/UTS/public/styles/Home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,600;1,600&display=swap" rel="stylesheet">

</head>

<body>
    <?php
    if ($filePath !== 'client/pages/auth/Login.php' && $filePath !== 'client/pages/auth/Daftar.php' && $filePath !== 'client/pages/admin/Home.php') {
        include('./client/components/Navbar.php');
    }
    ?>
    <div id="content">
        <?php
        if (file_exists($filePath)) {
            include($filePath);
        }
        ?>
    </div>
    <?php
    if ($filePath !== 'client/pages/auth/Login.php' && $filePath !== 'client/pages/auth/Daftar.php' && $filePath !== 'client/pages/admin/Home.php') {
        include('./client/components/Footer.php');
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="/Katalis-JTI/public/js/Login.js"></script>
    <script src="/Katalis-JTI/public/js/Data.js"></script>
</body>

</html>