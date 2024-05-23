<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['post_reply']) && isset($_GET['souvenir_id']) && isset($_SESSION['laureat_id'])) {
        $reply_text = $_POST['post_reply'];
        $souvenir_id = $_GET['souvenir_id'];
        $reply_by = $_SESSION['laureat_id'];

        $stmt = $db->prepare('INSERT INTO Souvenir_reply (reply_souvenir, reply_by, reply_text, dateR) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$souvenir_id, $reply_by, $reply_text]);

        header("Location: ../../laureat.php");
        exit();
    } else {
        echo "Error: All fields are required.";
    }
} else {
    echo "Error: Invalid request method.";
}
