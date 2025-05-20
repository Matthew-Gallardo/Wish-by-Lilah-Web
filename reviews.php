<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

include 'db.php';

// Get approved testimonials
$result = $conn->query("SELECT * FROM testimonials WHERE status = 'reviewed' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Approved Reviews</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <img src="assets/logo.png" alt="Wish by Lilah">
        <a href="dashboard.php" >Reservation</a>
        <a href="testimonials.php" class="active">Testimonials</a>
		<a href="codegen.php">code gen</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main">
        <h1>Reviews</h1>
        <div class="testimonial-tabs">
            <a href="testimonials.php">Pending</a>
            <a href="reviews.php" class="active">Approved</a>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert success">
                <?php echo htmlspecialchars($_GET['message'] ?? 'Operation completed successfully'); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert error">
                <?php echo htmlspecialchars($_GET['message'] ?? 'An error occurred'); ?>
            </div>
        <?php endif; ?>

        <h2 class="subheading">Manage Approved Reviews</h2>
        
        <?php if ($result->num_rows === 0): ?>
            <p class="no-records">No approved reviews found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Remark</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['message']) ?></td>
                            <td><?= str_repeat('★', $row['rating']) ?></td>
                            <td>
                                <span class="approved-badge">Approved</span>
                            </td>
                            <td>
                                <form method="post" action="testimonial_action.php">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" class="reject" name="action" value="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <style>
        .approved-badge {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</body>
</html>
