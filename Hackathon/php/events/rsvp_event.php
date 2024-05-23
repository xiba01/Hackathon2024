<?php
require '../connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['laureat_id'])) {
        $event_id = $_POST['event_id'];
        $laureat_id = $_SESSION['laureat_id'];
        $status = $_POST['status'];

        error_log("Received data - Event ID: $event_id, Laureat ID: $laureat_id, Status: $status");

        $check_sql = "SELECT * FROM Event_attendees WHERE event_id = :event_id AND laureat_id = :laureat_id";
        $check_stmt = $db->prepare($check_sql);
        $check_stmt->execute([
            ':event_id' => $event_id,
            ':laureat_id' => $laureat_id
        ]);

        if ($check_stmt->rowCount() == 0) {
            $sql = "INSERT INTO Event_attendees (event_id, laureat_id, status)
                    VALUES (:event_id, :laureat_id, :status)";
            $stmt = $db->prepare($sql);
            if ($stmt->execute([
                ':event_id' => $event_id,
                ':laureat_id' => $laureat_id,
                ':status' => $status,
            ])) {
                echo 'RSVP submitted successfully!';
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("SQL error: " . implode(":", $errorInfo));
                echo 'Failed to submit RSVP. SQL Error: ' . $errorInfo[2];
            }
        } else {
            echo 'You are already registered for this event.';
        }
    } else {
        echo 'User not logged in.';
    }
} else {
    echo 'Invalid request method.';
}
