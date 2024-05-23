<?php
include 'php/connect.php';
 $sql = "DELETE FROM Laureat WHERE Identifiant = :identifiant";
 $stmt = $pdo->prepare($sql);
 $stmt->bindParam(':identifiant', $_GET['id'], PDO::PARAM_STR);
 $stmt->execute();
 header("Location: demande_laureat.php");