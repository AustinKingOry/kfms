<?php
session_start();

function checkLogin() {
    $ROOT = '/kfms/';
    if (!isset($_SESSION['user'])) {
        header('Location: '.$ROOT.'login.php');
        exit();
    }
}

function checkRole($role) {
    $ROOT = '/kfms/';
    if ($_SESSION['user']['role'] != $role) {
        header('Location: '.$ROOT.'dashboard.php');
        exit();
    }
}
?>
