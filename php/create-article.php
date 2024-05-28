<?php
session_start();
include './connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article_titre = $_POST['article_titre'];
    $article_intro = $_POST['message'];
    $article_section1 = $_POST['section1_titre'];
    $article_s1content = $_POST['section1-content'];
    $article_section2 = $_POST['section2_titre'];
    $article_s2content = $_POST['section2-content'];
    $article_section3 = $_POST['section3_titre'];
    $article_s3content = $_POST['section3-content'];
    $article_conclusion = $_POST['conclusion'];
    $article_intro_img = '';

    // Handle file upload
    if (isset($_FILES['article_img']) && $_FILES['article_img']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['article_img']['tmp_name'];
        $fileName = $_FILES['article_img']['name'];
        $fileSize = $_FILES['article_img']['size'];
        $fileType = $_FILES['article_img']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Check if the file type is allowed
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'svg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory in which the uploaded file will be moved
            $uploadFileDir = '../asset/images/articles/';

            // Check if the directory exists, if not create it
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }

            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Save only the file name, not the full path
                $article_intro_img = $newFileName;
            } else {
                echo 'There was some error moving the file to the upload directory. Please make sure the upload directory is writable by the web server.';
            }
        } else {
            echo 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    }

    // Using PDO to insert data into the database
    try {
        $sql = "INSERT INTO Article (article_titre, article_by, article_date, article_content1, article_intro_img, article_section1, article_s1content, article_section2, article_s2content, article_section3, article_s3content, article_conclusion) 
                VALUES (:article_titre, :article_by, NOW(), :article_intro, :article_intro_img, :article_section1, :article_s1content, :article_section2, :article_s2content, :article_section3, :article_s3content, :article_conclusion)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':article_titre', $article_titre);
        $stmt->bindParam(':article_by', $_SESSION['laureat_id']);
        $stmt->bindParam(':article_intro', $article_intro);
        $stmt->bindParam(':article_intro_img', $article_intro_img);
        $stmt->bindParam(':article_section1', $article_section1);
        $stmt->bindParam(':article_s1content', $article_s1content);
        $stmt->bindParam(':article_section2', $article_section2);
        $stmt->bindParam(':article_s2content', $article_s2content);
        $stmt->bindParam(':article_section3', $article_section3);
        $stmt->bindParam(':article_s3content', $article_s3content);
        $stmt->bindParam(':article_conclusion', $article_conclusion);

        if ($stmt->execute()) {
            // Get the ID of the newly created record
            $article_id = $db->lastInsertId();
            // Redirect to the new article's page
            header("Location: ../article?article_id=" . $article_id);
            exit;
        } else {
            echo "Error: Could not execute the statement.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $db = null; // Close the database connection
}
