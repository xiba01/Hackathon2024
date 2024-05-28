<?php
require("./connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_SESSION['laureat_id'];
    $message = $_POST['avis'];
    $today = date('Y-m-d');
    // Specify the columns explicitly
    $query = "INSERT INTO Avis (identifiant, Avis, dateA) VALUES (:id, :message, :today)";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $identifiant);
    $stmt->bindParam(':today', $today);
    $stmt->bindParam(':message', $message);
    $stmt->execute();
    header('Location: ../laureat.php');
}
