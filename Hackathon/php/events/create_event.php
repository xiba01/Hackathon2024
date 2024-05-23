<?php
session_start();
require '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_name = $_POST['event_titre'];
    $event_date = $_POST['event_date'];
    $location = $_POST['event_localisation'];
    $description = $_POST['event_desc'];
    $created_by = $_SESSION['laureat_id'];

    if (isset($_FILES['event_img']) && $_FILES['event_img']['error'] == UPLOAD_ERR_OK) {
        $img_name = basename($_FILES['event_img']['name']);
        $img_tmp_name = $_FILES['event_img']['tmp_name'];
        $img_size = $_FILES['event_img']['size'];
        $img_error = $_FILES['event_img']['error'];

        $upload_dir = '../../uploads/events/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $img_path = $upload_dir . $img_name;

        if (!move_uploaded_file($img_tmp_name, $img_path)) {
            die("Failed to upload file");
        }
    } else {
        $img_name = null;
    }

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

    $event_id = $db->lastInsertId();

    header("Location: ../../event.php?event_id=" . $event_id);
}
?>

