<?php
session_start();
session_destroy();
$_SESSION['is_admin'] == 0;
header("Location: login.php");
exit;
?>
