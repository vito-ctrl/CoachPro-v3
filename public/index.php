<?php

ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once "../config/Database.php";

    $db = new Database();
    $pdo = $db->connect();

    $sql = "SELECT * FROM users";
    $users = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    print_r ($users);

    header("Location: ../app/View/register.html");
    // header("Location : ../app/View/register.html");
    exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello world</h1>
</body>
</html>