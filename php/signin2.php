<?php
session_start();
include './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricule = $_POST['matricule'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    try {
        $stmt = $db->prepare("SELECT * FROM Gestionnaire WHERE Matricule = :Matricule");
        $stmt->bindParam(':Matricule', $matricule);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['signed_in'] = true;
            $_SESSION['gestionaire_matricule'] = $_POST['Matricule'];


            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Matricule ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $db = null;
}
