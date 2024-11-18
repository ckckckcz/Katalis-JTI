<?php

require_once '../model/Users.php';
require_once '../model/Mahasiswa.php';
require_once '../model/Admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new Users();
    $allUser = $user->getAllUsers();

    foreach($allUser as $data) {
        if ($username == $data['username'] && $password == $data['password']) {
            session_start();
            $_SESSION['user_role'] = $data['role'];    
            $_SESSION['is_login'] = true;   
            
            if ($data['role'] == 'admin') {
                $admin = new Admin();
                $allAdmin = $admin->getAdminByNip($username);
                $_SESSION['user_data'] = $allAdmin;
                header('Location: /katalis/admin');
                die();
            } else {
                $mhs = new Mahasiswa();
                $allMhs = $mhs->getMahasiswaByNim($username);
                $_SESSION['user_data'] = $allMhs;
                header('Location: /katalis/dashboard');
                die();
            }
        }
    }
}
