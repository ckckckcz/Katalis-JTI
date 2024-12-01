<?php

require_once '../model/Users.php';
require_once '../model/Mahasiswa.php';
require_once '../model/Admin.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data = new Users(); 
    $allUser = $data->getAllUsers();
    $errors = $_SESSION['errors'] ?? [];

    if (empty($username)) {
        $errors['username'] = 'Username tidak boleh kosong.';
    }

    if (empty($password)) {
        $errors['password'] = 'Password tidak boleh kosong.';
    }

    if (!empty($errors)) {
        header('Location: /katalis/login');
        die();
    }

    foreach($allUser as $data) {
        if ($username == $data['username'] && $password == $data['password']) {
            $_SESSION['user_role'] = $data['role'];    
            $_SESSION['is_login'] = true;
            
            if ($data['role'] == 'admin') {
                $dataAdmin = new Admin();
                $allAdmin = $dataAdmin->getAdminByNip($username); 
                
                if (!empty($allAdmin)) {
                    $_SESSION['user_data'] = $allAdmin;
                    unset($_SESSION['errors']);
                } else {
                    $errors['data_admin'] = 'Data tidak ditemukan.';
                    header('Location: /katalis/login');
                    die;
                }

                header('Location: /katalis/admin');
                die();
            } else  {
                $dataMhs = new Mahasiswa();
                $allMhs = $dataMhs->getMahasiswaByNim($username);

                if (!empty($allMhs)) {
                    $_SESSION['user_data'] = $allMhs;
                    unset($_SESSION['errors']);
                } else {
                    $errors['data_mhs'] = 'Data tidak ditemukan.';
                    header('Location: /katalis/login');
                    die;
                }

                header('Location: /katalis/user');
                die();
            }
        } else {
            Header('Location: /katalis/login');
        }
    }
}
