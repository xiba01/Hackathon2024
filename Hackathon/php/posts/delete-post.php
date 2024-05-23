<?php
session_start();
require_once '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $postId = $input['id'];

    // Verify if the user is the owner of the post
    $stmt = $db->prepare('SELECT id_laureat FROM Souvenir WHERE identifiant = :id');
    $stmt->execute(['id' => $postId]);
    $souvenir = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($souvenir && $souvenir['id_laureat'] == $_SESSION['laureat_id']) {
        // Proceed with deletion
        $deleteStmt = $db->prepare('DELETE FROM Souvenir WHERE identifiant = :id');
        $deleteStmt->execute(['id' => $postId]);

        if ($deleteStmt->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
