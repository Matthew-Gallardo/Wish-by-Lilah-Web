<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) { // Changed from 'loggedin' to 'admin_id'
    header("Location: login.php");
    exit;
}

include 'db.php';

// Get pending testimonials
$result = $conn->query("SELECT * FROM testimonials WHERE status = 'pending' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Pending Testimonials</title>
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
        <h1>Testimonials</h1>

        <div class="testimonial-tabs">
            <a href="testimonials.php" class="active">Pending</a>
            <a href="reviews.php">Approved</a>
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

        <h2 class="subheading">Manage Pending Reviews</h2>
        
        <?php if ($result->num_rows === 0): ?>
            <p class="no-records">No pending testimonials found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Rating</th>
                        <th>Image</th>
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
                                <?php if ($row['image']): ?>
                                    <img src="<?= $row['image'] ?>" alt="Image" style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                                <?php else: ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td>
                                <form method="post" action="testimonial_action.php" style="display: flex; gap: 5px; flex-direction: column;">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" class="accept" name="action" value="accept">Accept</button>
                                    <button type="submit" class="reject" name="action" value="reject">Reject</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>