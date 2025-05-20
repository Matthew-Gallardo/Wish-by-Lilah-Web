<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Destroy session
    session_unset();
    session_destroy();

    // Redirect to login page
    header("Location: login.php");
    exit();
} else {
    // If user accesses logout directly without being logged in
    header("Location: login.php");
    exit();
}
?>
