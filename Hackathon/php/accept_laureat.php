<?php
include './php/connect.php';
$query = "UPDATE Laureat SET valide = 1 WHERE Identifiant = " . $_GET['id'];
$pdostm = $db->prepare($query);
$pdostm->execute();
header('Location: demande_laureat.php');