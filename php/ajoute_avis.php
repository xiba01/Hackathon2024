<?php 
include_once("./php/connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_SESSION['laureat_id'];
    $message = $_POST['message'];
    $today = date('Y-m-d');
    $query = "INSERT INTO Avis VALUES (:id , :message , :today)";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $identifiant);
    $stmt->bindParam(':today', $today);
    $stmt->bindParam(':message', $message);
    $stmt->execute();
    header('Location: ./php/feed.php');
}