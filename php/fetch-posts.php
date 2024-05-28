<?php
$sql = 'SELECT * FROM Souvenir ORDER BY dateS DESC';

$souvenirs = $db->prepare($sql);
$souvenirs->execute();

$souvenir = $souvenirs->fetch(PDO::FETCH_ASSOC);
