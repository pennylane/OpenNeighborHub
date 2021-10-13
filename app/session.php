<?php

require_once 'errors.php';

function check_session() {
    session_start();
    if (isset($_SESSION['uid'])) {
        return true;
    } else {
        return false;
    }
}

function verify_session() {
    session_start();
    if (isset($_SESSION['uid'])) {
        return true;
    } else {
//        error_log('[ERROR] User session not valid', 0);
//       header("Location: https://".$_SERVER['HTTP_HOST']."/login.php");
//        exit;
		return false;
    }
}

function check_method($method) {
    if ($_SERVER['REQUEST_METHOD'] === $method) {
        return true;
    } else {
        return false;
    }
}

function verify_method($method) {
    if ($_SERVER['REQUEST_METHOD'] === $method) {
        return true;
    } else {
        throw_405();
    }
}

