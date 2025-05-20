<?php
// Include database connection
include 'db.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $firstName = $_POST['first-name'] ?? '';
    $lastName = $_POST['last-name'] ?? '';
    $name = $firstName . ' ' . $lastName;
    $email = $_POST['email'] ?? '';
    $villa = $_POST['villa'] ?? '';
    $eventType = $_POST['event-type'] ?? '';
    $eventDate = $_POST['event-date'] ?? '';
    $eventTime = $_POST['preferred-time'] ?? '';
    $guests = (int)($_POST['guests'] ?? 0);
    $details = $_POST['other-details'] ?? '';

    // Validate required fields
    if (empty($name) || empty($email) || empty($villa) || empty($eventType) || 
        empty($eventDate) || empty($eventTime) || $guests <= 0) {
        // Redirect back with error
        header("Location: contact.php?status=error&message=Please fill all required fields");
        exit;
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO reservations (name, email, villa, event_type, event_date, event_time, guests, details) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("ssssssss", $name, $email, $villa, $eventType, $eventDate, $eventTime, $guests, $details);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Success
        header("Location: contact.php?status=success&message=Your reservation request has been submitted successfully. We will contact you shortly.");
    } else {
        // Error
        header("Location: contact.php?status=error&message=There was an error submitting your reservation. Please try again later.");
    }
    
    $stmt->close();
} else {
    // Not a POST request
    header("Location: contact.php");
}

$conn->close();
?>