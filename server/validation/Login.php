<?php

require_once '../model/Users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'] ?? '';

    $users = new Users();
    $allUsers = $users->getAllUsers();

    $isValid = false;
    foreach ($allUsers as $user) {
        if ($user['username'] === $nim) {
            $isValid = true;
            break;
        }
    }

    echo json_encode(['isValid' => $isValid]);
    exit;
}
