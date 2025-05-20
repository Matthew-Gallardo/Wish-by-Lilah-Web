<?php
$host = 'localhost';
$user = 'wishaapm_wish_admin';
$pass = 'adminwish12345';
$dbname = 'wishaapm_backend';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
