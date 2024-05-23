<?php
include './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $tel = $_POST['tel'];
    $promotion = $_POST['promotion'];
    $filiere = $_POST['filiere'];
    $etablissement = $_POST['etablissement'];
    $fonction = $_POST['post-act'];
    $employeur = $_POST['entreprise'];
    $valide = 0;

    if ($password !== $confirmPassword) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    $mdp = password_hash($password, PASSWORD_BCRYPT);

    try {
        $checkEmailStmt = $db->prepare("SELECT COUNT(*) FROM Laureat WHERE email = :email");
        $checkEmailStmt->bindParam(':email', $email);
        $checkEmailStmt->execute();
        $emailExists = $checkEmailStmt->fetchColumn();

        if ($emailExists) {
            echo "L'adresse e-mail est déjà utilisée.";
            exit();
        }

        if (isset($_FILES['photo-profile']) && $_FILES['photo-profile']['error'] === UPLOAD_ERR_OK) {
            $fileTmpName = $_FILES['photo-profile']['tmp_name'];
            $fileName = $_FILES['photo-profile']['name'];
            $fileSize = $_FILES['photo-profile']['size'];
            $fileType = $_FILES['photo-profile']['type'];

            $uploadDir = '../asset/images/laureat';

            $uniqueFileName = uniqid() . '_' . $fileName;

            if (move_uploaded_file($fileTmpName, $uploadDir . $uniqueFileName)) {
                $photoProfile = $uniqueFileName;
            } else {
                echo "Error uploading file.";
                exit();
            }
        } else {
            echo "Error uploading file.";
            exit();
        }

        $stmt = $db->prepare("INSERT INTO Laureat (nom, Prenom, email, mdp, Tel, promotion, Filiere, Etablissement, Fonction, Employeur, img, valide) VALUES (:nom, :prenom, :email, :mdp, :tel, :promotion, :filiere, :etablissement, :fonction, :employeur, :photoProfile, :valide)");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':promotion', $promotion);
        $stmt->bindParam(':filiere', $filiere);
        $stmt->bindParam(':etablissement', $etablissement);
        $stmt->bindParam(':fonction', $fonction);
        $stmt->bindParam(':employeur', $employeur);
        $stmt->bindParam(':photoProfile', $photoProfile);
        $stmt->bindParam(':valide', $valide, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $query1 = 'SELECT * FROM count_Laureat where creation_date = CURRENT_DATE() and valid = 0';
            $result = $db->query($query1);
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) > 0) {
                $row = $rows[0];
                $query2 = 'UPDATE count_Laureat SET numbre_created = :numbre_created where creation_date = CURRENT_DATE() and valid=0';
                $stmt = $db->prepare($query2);
                $stmt->bindParam(':numbre_created', $numbre_created, PDO::PARAM_INT);
                $numbre_created = $row['numbre_created'] + 1;
                $stmt->execute();
                echo "done1";
            } else {
                $query2 = 'INSERT INTO count_Laureat values (:creation_date,:valid,:numbre_created)';
                $stmt = $db->prepare($query2);
                $stmt->bindParam(':creation_date', $creation_date, PDO::PARAM_STR);
                $stmt->bindParam(':valid', $valid, PDO::PARAM_INT);
                $stmt->bindParam(':numbre_created', $numbre_created, PDO::PARAM_INT);
                $creation_date = date('Y-m-d');
                $valid = 0;
                $numbre_created = 1;
                $stmt->execute();
                echo "done2";
            }

            header('location: ../signin.php');
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $db = null;
}
