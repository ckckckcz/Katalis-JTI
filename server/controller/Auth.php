<?php

Class Auth extends Controller {
    
    public function login() {

    }

    public function logout() {
        session_start();
        
        if ($_SESSION['is_login'] == true) {
            $_SESSION['is_login'] = false;
            session_destroy();
            $this->view('client/views/Home');
        } else {
            $this->view('client/views/auth/Login');
        }
    }
}