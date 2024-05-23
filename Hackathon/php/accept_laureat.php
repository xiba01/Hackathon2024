<?php
include 'connect.php';
require_once '../vendor/autoload.php';
require_once 'email_script.php';

$query = "UPDATE Laureat SET valide = 1 WHERE Identifiant = " . $_GET['id'];
$pdostm = $db->prepare($query);
$pdostm->execute();

$query2 = "SELECT * FROM Laureat WHERE Identifiant = " . $_GET['id'];
$pdostm2 = $db->prepare($query2);
$pdostm2->execute();
$laureat = $pdostm2->fetch(PDO::FETCH_ASSOC);

$query1 = "SELECT * FROM count_Laureat where creation_date = CURRENT_DATE() and valid = 1";
$result = $db->query($query1);
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
if(count($rows)>0){
    $row = $rows[0];
    $query2 = "UPDATE count_Laureat SET numbre_created = :numbre_created where creation_date = CURRENT_DATE() and valid = 1";
    $stmt = $db->prepare($query2);
    $stmt->bindParam(':numbre_created', $numbre_created, PDO::PARAM_INT);
    $numbre_created = $row['numbre_created'] + 1;
    $stmt->execute();
}else{
    $query2 = "INSERT INTO count_Laureat values (:creation_date,:valid,:numbre_created)";
    $stmt = $db->prepare($query2);
    $stmt->bindParam(':creation_date', $creation_date, PDO::PARAM_STR);
    $stmt->bindParam(':valid', $valid, PDO::PARAM_INT);
    $stmt->bindParam(':numbre_created', $numbre_created, PDO::PARAM_INT);
    $creation_date = date('Y-m-d');
    $valid = 1;
    $numbre_created = 1;
    $stmt->execute();
}

$send = sendMail($laureat['email']);

header('Location: ../demande_laureat.php?accepter=True');
?>