<?php
session_start();
require_once '../connect.php'; // Make sure this file connects to your database

if (isset($_POST['souvenir_id'])) {
    $souvenirId = intval($_POST['souvenir_id']);

    // Start a transaction
    $db->beginTransaction();

    try {
        // Delete replies first
        $sqlReplies = 'DELETE FROM Souvenir_reply WHERE reply_souvenir = :souvenir_id';
        $stmtReplies = $db->prepare($sqlReplies);
        $stmtReplies->bindParam(':souvenir_id', $souvenirId, PDO::PARAM_INT);
        $stmtReplies->execute();

        // Delete the souvenir
        $sqlSouvenir = 'DELETE FROM Souvenir WHERE identifiant = :souvenir_id';
        $stmtSouvenir = $db->prepare($sqlSouvenir);
        $stmtSouvenir->bindParam(':souvenir_id', $souvenirId, PDO::PARAM_INT);
        $stmtSouvenir->execute();

        // Commit the transaction
        $db->commit();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        // Rollback the transaction if something failed
        $db->rollBack();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
