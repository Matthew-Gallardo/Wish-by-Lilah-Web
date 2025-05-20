<?php
// Include database connection
include 'db.php';

// Set content type to JSON
header('Content-Type: application/json');

// Function to validate and sanitize input
function sanitize($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
    exit;
}

// Get form data
$firstName = sanitize($_POST['firstName'] ?? '');
$lastName = sanitize($_POST['lastName'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$rating = (int)($_POST['rating'] ?? 0);
$code = sanitize($_POST['code'] ?? '');
$testimonial = sanitize($_POST['testimonial'] ?? '');
$name = $firstName . ' ' . $lastName;

// Validate required fields
if (empty($firstName) || empty($lastName) || empty($email) || empty($code) || empty($testimonial) || $rating < 1 || $rating > 5) {
    echo json_encode([
        'success' => false,
        'message' => 'All fields are required'
    ]);
    exit;
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid email address'
    ]);
    exit;
}

// Check if the code exists and is valid
$stmt = $conn->prepare("SELECT id, used FROM codes WHERE code = ?");
$stmt->bind_param("s", $code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Code doesn't exist
    echo json_encode([
        'success' => false,
        'error' => 'invalid_code',
        'message' => 'Invalid code'
    ]);
    exit;
}

$codeData = $result->fetch_assoc();
$codeId = $codeData['id'];
$codeUsed = $codeData['used'];

// Check if the code has already been used
if ($codeUsed) {
    echo json_encode([
        'success' => false,
        'error' => 'code_used',
        'message' => 'CODE IS ONE TIME USE ONLY'
    ]);
    exit;
}

// Process image upload if provided
$imagePath = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/testimonials/';
    
    // Create directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    // Generate unique filename
    $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
    $targetFile = $uploadDir . $fileName;
    
    // Check file type
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        echo json_encode([
            'success' => false,
            'message' => 'Only JPG, JPEG, and PNG files are allowed'
        ]);
        exit;
    }
    
    // Check file size (max 2MB)
    if ($_FILES['image']['size'] > 2000000) {
        echo json_encode([
            'success' => false,
            'message' => 'File is too large (max 2MB)'
        ]);
        exit;
    }
    
    // Upload file
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $imagePath = $targetFile;
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Failed to upload image'
        ]);
        exit;
    }
}

// Start transaction
$conn->begin_transaction();

try {
    // Insert testimonial
    $stmt = $conn->prepare("INSERT INTO testimonials (name, email, rating, message, image, status, code_id) VALUES (?, ?, ?, ?, ?, 'pending', ?)");
    $stmt->bind_param("sssssi", $name, $email, $rating, $testimonial, $imagePath, $codeId);
    $stmt->execute();
    
    // Mark code as used
    $stmt = $conn->prepare("UPDATE codes SET used = 1, used_at = NOW() WHERE id = ?");
    $stmt->bind_param("i", $codeId);
    $stmt->execute();
    
    // Commit transaction
    $conn->commit();
    
    echo json_encode([
        'success' => true,
        'message' => 'Testimonial submitted successfully'
    ]);
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred: ' . $e->getMessage()
    ]);
}