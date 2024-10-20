<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $file_path = '../data/users.json';

    // Memuat data pengguna dari file JSON
    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        $users = json_decode($json_data, true);
    } else {
        $users = [];
    }

    // Validasi kata sandi dan konfirmasi
    if ($password !== $password_confirm) {
        $_SESSION['register_error'] = true;
        header('Location: /UTS/daftar');
        exit();
    }

    // Cek apakah email sudah terdaftar
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            $_SESSION['register_error'] = true;
            header('Location: /UTS/daftar');
            exit();
        }
    }

    // Simpan data baru ke array
    $new_user = [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ];
    $users[] = $new_user;

    // Menyimpan data pengguna ke file JSON
    file_put_contents($file_path, json_encode($users, JSON_PRETTY_PRINT));

    // Set session untuk notifikasi sukses
    $_SESSION['register_success'] = true;

    header('Location: login.php');
    exit();
} else {
    die("Server Error.");
}
?>