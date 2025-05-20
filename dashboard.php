<?php
session_start();
require 'db.php';

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch reservations
$result = $conn->query("SELECT * FROM reservations ORDER BY created_at DESC");

// Check for status messages
$statusMessage = '';
if (isset($_GET['status']) && isset($_GET['message'])) {
    $status = $_GET['status'];
    $message = $_GET['message'];
    $statusMessage = "<div class='alert alert-{$status}'>{$message}</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <img src="assets/logo.png" alt="Wish by Lilah">
        <a href="dashboard.php" class="active">Reservation</a>
        <a href="testimonials.php">Testimonials</a>
		<a href="codegen.php">code gen</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="main">
        <h1>Admin Dashboard</h1>
        
        <?php echo $statusMessage; ?>
        
        <h2 class="subheading">Reservation Inquiries</h2>
        
        <?php if ($result->num_rows === 0): ?>
            <p class="no-records">No reservation inquiries found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Villa</th>
                        <th>Event Type</th>
                        <th>Event Date</th>
                        <th>Event Time</th>
                        <th>Guests</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['villa']) ?></td>
                        <td><?= htmlspecialchars($row['event_type']) ?></td>
                        <td><?= date('M d, Y', strtotime($row['event_date'])) ?></td>
                        <td><?= date('h:i A', strtotime($row['event_time'])) ?></td>
                        <td><?= $row['guests'] ?></td>
                        <td class="action-buttons">
                            <?php if ($row['status'] === 'pending'): ?>
                                <!-- Pending: Show both action buttons -->
                                <a href="update_status.php?id=<?= $row['id'] ?>&status=approved" title="Approve">✅</a>
                                <a href="update_status.php?id=<?= $row['id'] ?>&status=declined" title="Decline">❌</a>
                            <?php elseif ($row['status'] === 'approved'): ?>
                                <!-- Approved: Show only the check mark -->
                                <span class="status-icon">✅</span>
                            <?php elseif ($row['status'] === 'declined'): ?>
                                <!-- Declined: Show only the X mark -->
                                <span class="status-icon">❌</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>