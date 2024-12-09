<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password_confirm'];

    if (empty($name) || empty($email) || empty($password) || empty($passwordConfirm)) {
        die("All fields are required.");
    }

    if ($password !== $passwordConfirm) {
        die("Passwords do not match.");
    }

    $nameParts = explode(' ', $name);
    if (count($nameParts) < 2) {
        die("Please provide your full name (first and last name).");
    }
    $firstName = $nameParts[0];
    $lastName = $nameParts[1];

    // Generate the username
    $username = strtolower(substr($firstName, 0, 1) . $lastName);

    // Inserts user into the database
    $stmt = $pdo->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
    try {
          // Gets the highest current user_id
          $stmt = $pdo->query("SELECT MAX(user_id) AS max_id FROM user");
          $result = $stmt->fetch();
          $newUserId = $result['max_id'] ? $result['max_id'] + 1 : 1;
  
          // Inserts the new user
          $stmt = $pdo->prepare("INSERT INTO user (user_id, username, email, password, is_admin) VALUES (?, ?, ?, ?, ?)");
          $stmt->execute([$newUserId, $username, $email, $password, 'user']);
  
          // Sets session variables
          $_SESSION['user_id'] = $newUserId;
          $_SESSION['is_admin'] = 'user';
          $_SESSION['username'] = $username;
        header("Location: index.php");
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>