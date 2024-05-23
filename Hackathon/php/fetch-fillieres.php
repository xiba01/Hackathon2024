<?php
$sql = 'SELECT * FROM Filiere';
$allCategories = $db->prepare($sql);
$allCategories->execute();
