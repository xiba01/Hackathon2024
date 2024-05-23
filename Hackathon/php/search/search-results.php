<?php

$query = isset($_GET['query']) ? $_GET['query'] : '';

$laureatRes = $db->prepare("SELECT Identifiant, nom, Prenom, promotion, Filiere, Etablissement, Fonction, Employeur FROM Laureat WHERE nom LIKE :search OR Prenom LIKE :search");
$search = "%" . $query . "%";
$laureatRes->bindParam(':search', $search, PDO::PARAM_STR);

$laureatRes->execute();
