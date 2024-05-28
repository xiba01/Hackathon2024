<?php
session_start();
include './connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    try {
        $stmt = $db->prepare("SELECT * FROM Laureat WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mdp'])) {
            $_SESSION['signed_in'] = true;
            $_SESSION['laureat_email'] = $user['email'];
            $_SESSION['laureat_id'] = $user['Identifiant'];

            if ($remember) {
                // Set a cookie that lasts for 30 days
                setcookie('laureat_email', $user['email'], time() + (86400 * 30), "/");
                setcookie('laureat_id', $user['Identifiant'], time() + (86400 * 30), "/");
            }

            header("Location: ../laureat.php");
            exit();
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $db = null;
}
