<?php

if ($_SESSION['is_login']) {
    $_SESSION['is_login'] = false;
    session_destroy();
    exit();
} else {
    Header('Location: /katalis/login');
}