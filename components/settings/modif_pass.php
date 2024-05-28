<?php
include_once('../../php/connect.php');
session_start();
$currentPassword = $_POST['current-password'];
$oldPassword = $_POST['old-password'];

if (!password_verify($currentPassword , $oldPassword)) {
    $_SESSION['error'] = 0;
    header("Location: ../../settings.php?email=".$_SESSION['laureat_email']);
    exit();
    echo 'error'."<br>";
    echo $currentPassword .'<br>';
    echo $oldPassword;
}
else {
    $newPassword = password_hash($_POST['new-password'], PASSWORD_BCRYPT);
    $query = "UPDATE Laureat SET mdp=:pass WHERE Identifiant=:id;";
    $pdostmt = $db->prepare($query);
    $pdostmt->execute([
        "pass" => $newPassword,
        "id" => $_SESSION['laureat_id'],
    ]);
    $pdostmt->closeCursor();
    $_SESSION['error'] = 1;
    header("Location: ../../settings.php?email=".$_SESSION['laureat_email']);
    exit();
}



?>
