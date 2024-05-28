<?php
include_once('../../php/connect.php');
session_start();
try {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $uploadDir = '../../asset/images/laureat/';

        $uniqueFileName = uniqid() . '_' . $fileName;

        if (move_uploaded_file($fileTmpName, $uploadDir . $uniqueFileName)) {
            $photoProfile = $uniqueFileName;
        } else {
            $_SESSION['error'] = 0;
            header("Location: ../../settings.php?email=".$_SESSION['laureat_email']);
            exit();
        }
    } else {
        $photoProfile = $_POST['old-img'];
    }
    $query = "UPDATE Laureat SET img=:img,Tel=:tel,Fonction=:fct,Employeur=:emp,about=:abt WHERE Identifiant=:id;";
    $pdostmt = $db->prepare($query);
    $pdostmt->execute([
        "img" => $photoProfile,
        "tel" => $_POST['tel'],
        "fct" => $_POST['poste'],
        "emp" => $_POST['entrep'],
        "abt" => $_POST['about'],
        "id" => $_SESSION['laureat_id']

    ]);
    $pdostmt->closeCursor();
    $_SESSION['error'] = 1;
    header("Location: ../../settings.php?email=".$_SESSION['laureat_email']);
    exit();
}
catch (\PDOException $e) {
    $_SESSION['error'] = 0;
    header("Location: ../../settings.php?email=".$_SESSION['laureat_email']);
    exit();
}



?>
