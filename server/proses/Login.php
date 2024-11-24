<?php

require_once '../model/Users.php';
require_once '../model/Mahasiswa.php';
require_once '../model/Admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data = new Users(); 
    $allUser = $data->getAllUsers();

    foreach($allUser as $data) {
        if ($username == $data['username'] && $password == $data['password']) {
            session_start();
            $_SESSION['user_role'] = $data['role'];    
            $_SESSION['is_login'] = true;
            
            if ($data['role'] == 'admin') {
                $dataAdmin = new Admin();
                $allAdmin = $dataAdmin->getAdminByNip($username); 
                
                if (!empty($allAdmin)) {
                    $_SESSION['user_data'] = $allAdmin;
                } else {
                    $_SESSION['error_login'] = 'Data tidak ditemukan.';
                    header('Location: /katalis/login');
                }

                header('Location: /katalis/admin');
                die();
            } else  {
                $dataMhs = new Mahasiswa();
                $allMhs = $dataMhs->getMahasiswaByNim($username);

                if (!empty($allMhs)) {
                    $_SESSION['user_data'] = $allMhs;
                } else {
                    $_SESSION['error_login'] = 'Data tidak ditemukan.';
                    header('Location: /katalis/login');
                }

                header('Location: /katalis/dashboard');
                die();
            }
        } else {
            Header('Location: /katalis/login');
        }
    }
}
