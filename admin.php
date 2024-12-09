<?php
session_start();
include 'db.php';

// Check if the logged in user is an admin
if ($_SESSION['is_admin'] == 0) {
    header('Location: index.php');
    exit();
}

// Fetch users and contact requests
$usersQuery = $pdo->query("SELECT * FROM user");
$contactRequestsQuery = $pdo->query("SELECT * FROM contact_request");
$users = $usersQuery->fetchAll(PDO::FETCH_ASSOC);
$contactRequests = $contactRequestsQuery->fetchAll(PDO::FETCH_ASSOC);

// Delete user
if (isset($_GET['delete_user_id'])) {
    $deleteUserId = $_GET['delete_user_id'];
    $pdo->prepare("DELETE FROM user WHERE user_id = :user_id")->execute(['user_id' => $deleteUserId]);
    header('Location: admin.php');
    exit();
}

// Delete contact request
if (isset($_GET['delete_request_id'])) {
    $deleteRequestId = $_GET['delete_request_id'];
    $pdo->prepare("DELETE FROM contact_request WHERE id = :id")->execute(['id' => $deleteRequestId]);
    header('Location: admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Admin Dashboard</h1>
        <hr>
        
        <!-- Users Section -->
        <h2 class="mt-4">Users</h2>
        <div class="row">
            <?php foreach ($users as $user): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($user['username']) ?> (ID: <?= htmlspecialchars($user['user_id']) ?>)</h5>
                            <p class="card-text">
                                <strong>Email:</strong> <?= htmlspecialchars($user['email']) ?><br>
                                <strong>Admin:</strong> <?= htmlspecialchars($user['is_admin']) ?>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="admin.php?delete_user_id=<?= $user['user_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Contact Requests Section -->
        <h2 class="mt-4">Contact Requests</h2>
        <div class="row">
            <?php foreach ($contactRequests as $request): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Request ID: <?= htmlspecialchars($request['request_id']) ?></h5>
                            <p class="card-text">
                                <strong>Message:</strong> <?= htmlspecialchars($request['message']) ?>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="admin.php?delete_request_id=<?= $request['request_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
