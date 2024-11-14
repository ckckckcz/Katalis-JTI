<?php
session_start();

if ($_SESSION['is_login']) {
    $_SESSION['is_login'] = false;
    session_destroy();
    header('Location: /katalis');
}