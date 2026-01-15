<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once '../../config/Database.php';
    require_once '../Model/User.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ../pages/register.php');
        exit;
    }

    $db = new Database();
    $pdo = $db->connect();

    $user = new User($_POST);
    $user->create($pdo);

    // echo 'done success';
    header('Location: ../View/login.html');
    exit;