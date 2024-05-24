<?php
session_start();
require '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_name = $_POST['event_titre'];
    $event_date = $_POST['event_date'];
    $location = $_POST['event_localisation'];
    $description = $_POST['event_desc'];
    $created_by = $_SESSION['laureat_id'];

    $img_name = null;

    if (isset($_FILES['event_img']) && $_FILES['event_img']['error'] == UPLOAD_ERR_OK) {
        $img_tmp_name = $_FILES['event_img']['tmp_name'];
        $img_size = $_FILES['event_img']['size'];
        $img_error = $_FILES['event_img']['error'];

        // Validate image
        $img_info = getimagesize($img_tmp_name);
        if ($img_info === FALSE) {
            die("Uploaded file is not a valid image.");
        }

        $allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($img_info['mime'], $allowed_types)) {
            die("Only JPEG, PNG, GIF, and WEBP images are allowed.");
        }

        // Ensure upload directory exists
        $upload_dir = '../../asset/images/events/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        // Generate unique filename
        $img_extension = pathinfo($_FILES['event_img']['name'], PATHINFO_EXTENSION);
        $img_name = uniqid('event_', true) . '.' . $img_extension;
        $img_path = $upload_dir . $img_name;

        // Move uploaded file
        if (!move_uploaded_file($img_tmp_name, $img_path)) {
            die("Failed to upload file.");
        }
    }

    // Insert event details into the database
    $sql = "INSERT INTO Events (event_name, event_date, location, description, created_by, event_img)
            VALUES (:event_name, :event_date, :location, :description, :created_by, :event_img)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':event_name' => $event_name,
        ':event_date' => $event_date,
        ':location' => $location,
        ':description' => $description,
        ':created_by' => $created_by,
        ':event_img' => $img_name,
    ]);

    // Redirect to the event page
    $event_id = $db->lastInsertId();
    header("Location: ../../event.php?event_id=" . $event_id);
}
