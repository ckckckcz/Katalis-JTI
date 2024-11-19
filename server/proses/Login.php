<?php

require_once '../model/Users.php';
require_once '../model/Mahasiswa.php';
require_once '../model/Admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $allUser = getAllUsers();

    foreach($allUser as $data) {
        if ($username == $data['username'] && $password == $data['password']) {
            session_start();
            $_SESSION['user_role'] = $data['role'];    
            $_SESSION['is_login'] = true;
            
            if ($data['role'] == 'admin') {
                $allAdmin = getAdminByNip($username); 
                
                if (!empty($allAdmin)) {
                    $_SESSION['user_data'] = $allAdmin;
                } else {
                    $_SESSION['error'] = 'Data admin tidak ditemukan.';
                    header('Location: /katalis/login');
                }

                header('Location: /katalis/admin');
                die();
            } else {
                $allMhs = $mhs->getMahasiswaByNim($username);
                $_SESSION['user_data'] = $allMhs;
                header('Location: /katalis/dashboard');
                die();
            }
        } else {
            Header('Location: /katalis/login');
        }
    }
}
