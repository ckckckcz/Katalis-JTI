<?php

function checkAdmin() {
    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] != 'admin') {
            http_response_code(405);
            die;
        }
    } else {
        header('Location: /katalis');
    }
}

function checkMahasiswa() {
    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] != 'mahasiswa') {
            http_response_code(405);
            die;
        }
    } else {
        header('Location: /katalis');
    }
}