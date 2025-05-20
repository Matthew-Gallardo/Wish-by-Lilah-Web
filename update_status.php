<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Check if required parameters are provided
if (!isset($_GET['id']) || !isset($_GET['status'])) {
    header("Location: dashboard.php?status=error&message=Invalid request parameters");
    exit;
}

$id = (int)$_GET['id'];
$status = $_GET['status'];

// Validate status
if (!in_array($status, ['approved', 'declined'])) {
    header("Location: dashboard.php?status=error&message=Invalid status value");
    exit;
}

// Update reservation status
$stmt = $conn->prepare("UPDATE reservations SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    // If approved, send confirmation email to the guest
    if ($status === 'approved') {
        // Get reservation details for email
        $result = $conn->query("SELECT name, email, villa, event_date, event_time FROM reservations WHERE id = $id");
        if ($result && $result->num_rows > 0) {
            $reservation = $result->fetch_assoc();
            
            // In a real application, you would send an email here
            // For now, we'll just log it
            error_log("Sending confirmation email to {$reservation['email']} for {$reservation['villa']} on {$reservation['event_date']}");
        }
    }
    
    header("Location: dashboard.php?status=success&message=Reservation status updated to " . ucfirst($status));
} else {
    header("Location: dashboard.php?status=error&message=Error updating reservation status");
}

$stmt->close();
$conn->close();
?>