<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $remember_me = isset($_POST['remember_me']) ? 1 : 0;

    // Validasi kata sandi dan konfirmasi
    if ($password !== $password_confirm) {
        die("Kata sandi dan konfirmasi tidak cocok.");
    }

    $file_path = '../data/users.json';

    // Memuat data pengguna dari file JSON
    if (file_exists($file_path)) {
        $json_data = file_get_contents($file_path);
        $users = json_decode($json_data, true);
    } else {
        $users = [];
    }

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            die("Email sudah terdaftar.");
        }
    }

    // Simpan data baru ke array
    $new_user = [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'remember_me' => $remember_me
    ];
    $users[] = $new_user;

    // Menyimpan data pengguna ke file JSON
    file_put_contents($file_path, json_encode($users, JSON_PRETTY_PRINT));

    echo "Pendaftaran berhasil!";
} else {
    die("Server Error.");
}
?>