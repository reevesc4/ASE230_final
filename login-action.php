<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        die("Email and password are required.");
    }

    // Gets user data
    $log = $pdo->prepare("SELECT * FROM user WHERE email = ?");
    $log->execute([$email]);
    $user = $log->fetch();
    $username = $user['username'];

    if ($user && ($password = $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['is_admin'] = $user['is_admin'];
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        die("Invalid email or password.");
    }
}
?>