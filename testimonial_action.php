<?php
session_start();
include 'db.php';

// Check if user is logged in - use the same check as in testimonials.php
if (!isset($_SESSION['admin_id'])) { // If you chose Option 2
// OR
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) { // If you chose Option 1
    header("Location: login.php");
    exit;
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    
    if ($id > 0) {
        if ($action === 'accept') {
            // Update testimonial status to 'reviewed'
            $stmt = $conn->prepare("UPDATE testimonials SET status = 'reviewed' WHERE id = ?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                header("Location: testimonials.php?success=1&message=Testimonial approved successfully");
            } else {
                header("Location: testimonials.php?error=1&message=Error approving testimonial");
            }
            
            $stmt->close();
        } elseif ($action === 'reject' || $action === 'delete') {
            // Get image path before deleting
            $result = $conn->query("SELECT image FROM testimonials WHERE id = $id");
            $imagePath = null;
            
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $imagePath = $row['image'];
            }
            
            // Delete testimonial
            $stmt = $conn->prepare("DELETE FROM testimonials WHERE id = ?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                // Delete image file if it exists
                if ($imagePath && file_exists($imagePath)) {
                    unlink($imagePath);
                }
                
                header("Location: reviews.php?success=1&message=Testimonial deleted successfully");
            } else {
                header("Location: testimonials.php?error=1&message=Error deleting testimonial");
            }
            
            $stmt->close();
        }
    } else {
        header("Location: reviews.php?error=1&message=Invalid testimonial ID");
    }
} else {
    header("Location: testimonials.php");
}
?>