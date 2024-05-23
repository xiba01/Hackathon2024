<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include your database connection script
include 'db_connection.php'; // Adjust the path as necessary

// Initialize the variable
$conversation = [];

// Ensure the user is authenticated and get the user_id from the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Make sure to handle database connection and query errors
    if ($conn) {
        $query = "SELECT * FROM conversations WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $user_id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $conversation[] = $row;
            }
        } else {
            die("Database query failed: " . $stmt->error);
        }

        $stmt->close();
    } else {
        die("Database connection failed: " . $conn->connect_error);
    }
} else {
    die("User not authenticated.");
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Live Support Chat</title>
    <!-- Include CSS, JS, etc. -->
</head>
<body>
    <div id="chat-container">
        <!-- Check if $conversation is not empty before using it -->
        <?php if (!empty($conversation)): ?>
            <?php foreach ($conversation as $conv): ?>
                <div class="chat-message">
                    <!-- Render each conversation message -->
                    <p><?php echo htmlspecialchars($conv['message'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No conversations found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
