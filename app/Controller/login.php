<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    session_start();

    require_once '../../config/Database.php';
    require_once '../Model/User.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ../pages/register.php');
        exit;
    }

    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        die('All fields are required');
    }

    $db  = new Database();
    $pdo = $db->connect();

    $user = User::findByEmail($pdo, $email);

    if (!$user) {
        die('Invalid email');
    }

    // if (!password_verify($password, $user->getPassword())) {
    //     die('Invalid password');
    // }

    $_SESSION['user_id'] = $user->getId();
    $_SESSION['name']    = $user->getName();
    $_SESSION['role']    = $user->getRole();

    header('Location: dashboard.php');
    exit;
