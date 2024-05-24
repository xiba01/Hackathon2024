<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['post_img'])) {
        $fileError = $_FILES['post_img']['error'];
        if ($fileError !== UPLOAD_ERR_OK) {
            echo "File upload error. Error code: " . $fileError;
            exit;
        }
    } else {
        echo "No file uploaded.";
        exit;
    }

    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/svg+xml'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg'];

    $fileInfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $fileInfo->file($_FILES['post_img']['tmp_name']);
    $fileExtension = pathinfo($_FILES['post_img']['name'], PATHINFO_EXTENSION);

    if (!in_array($mimeType, $allowedMimeTypes) || !in_array($fileExtension, $allowedExtensions)) {
        echo "Invalid file type or extension.";
        exit;
    }

    $uploadDir = '../../asset/images/posts/';
    $uploadFileName = uniqid() . '.' . $fileExtension;
    $uploadFile = $uploadDir . $uploadFileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!move_uploaded_file($_FILES['post_img']['tmp_name'], $uploadFile)) {
        echo "Failed to upload image.";
        exit;
    }

    $stmt = $db->prepare('INSERT INTO Souvenir (disc, photo, created_time, id_laureat) VALUES (?, ?, NOW(), ?)');
    $stmt->execute([$_POST['post_disc'], $uploadFileName, $_SESSION['laureat_id']]);

    header("Location: ../../laureat.php");
    exit;
} else {
    echo "Invalid request method.";
}
