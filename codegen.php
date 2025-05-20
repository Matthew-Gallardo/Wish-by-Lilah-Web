<?php
// Include your database connection file
include 'db.php';

// Function to generate random alphanumeric code (6 characters)
function generateRandomCode($length = 6) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $result;
}

// Add a new random code to the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_code'])) {
    $newCode = generateRandomCode(6);
    $stmt = $conn->prepare("INSERT INTO codes (code) VALUES (?)");
    $stmt->bind_param("s", $newCode); // "s" for string
    if ($stmt->execute()) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error adding code: " . $conn->error;
    }
    $stmt->close();
}

// Delete a code from the database
if (isset($_GET['delete'])) {
    $idToDelete = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM codes WHERE id = ?");
    $stmt->bind_param("i", $idToDelete); // "i" for integer
    if ($stmt->execute()) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error deleting code: " . $conn->error;
    }
    $stmt->close();
}

// Fetch all codes from the database
$result = $conn->query("SELECT * FROM codes ORDER BY id DESC");
$codes = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $codes[] = $row;
    }
    $result->free();
} else {
    echo "Error fetching codes: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Random Code Generator</title>
<link rel="stylesheet" href="style.css">
<style>
    .container {
        max-width: 800px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    
    .code-generator-btn {
        background-color: #891d26;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        margin-bottom: 20px;
        transition: background-color 0.2s;
    }
    
    .code-generator-btn:hover {
        background-color: #5e0b15;
    }
    
    .code-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .code-table th {
        background-color: #891d26;
        color: white;
        padding: 12px;
        text-align: center;
    }
    
    .code-table td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    
    .code-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    
    .code-table tr:hover {
        background-color: #f1f1f1;
    }
    
    .status-badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: bold;
    }
    
    .status-available {
        background-color: #d4edda;
        color: #155724;
    }
    
    .status-used {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .delete-btn {
        color: #dc3545;
        text-decoration: none;
        font-weight: bold;
    }
    
    .delete-btn:hover {
        text-decoration: underline;
    }
    
    .used {
        background-color: rgba(248, 215, 218, 0.3);
    }
</style>
</head>
<body>
    <div class="sidebar">
        <img src="assets/logo.png" alt="Wish by Lilah">
        <a href="dashboard.php">Reservation</a>
        <a href="testimonials.php">Testimonials</a>
        <a href="codegen.php" class="active">Code Gen</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main">
        <h1>Code Generator</h1>
        <h2 class="subheading">Generate and Manage Testimonial Codes</h2>
        
        <div class="container">
            <form method="post" style="text-align: center; margin-bottom: 30px;">
                <button type="submit" name="add_code" class="code-generator-btn">Generate New Code</button>
            </form>
            
            <table class="code-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Used At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($codes)): ?>
                        <tr><td colspan="5">No codes found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($codes as $code): ?>
                            <tr class="<?= $code['used'] ? 'used' : '' ?>">
                                <td><?= htmlspecialchars($code['id']) ?></td>
                                <td><?= htmlspecialchars($code['code']) ?></td>
                                <td>
                                    <span class="status-badge <?= $code['used'] ? 'status-used' : 'status-available' ?>">
                                        <?= $code['used'] ? 'Used' : 'Available' ?>
                                    </span>
                                </td>
                                <td><?= $code['used_at'] ? htmlspecialchars($code['used_at']) : '-' ?></td>
                                <td>
                                    <a class="delete-btn" href="?delete=<?= (int)$code['id'] ?>" onclick="return confirm('Delete this code?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>