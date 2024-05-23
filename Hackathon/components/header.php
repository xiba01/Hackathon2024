<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['signed_in'])) {
  $_SESSION['signed_in'] = false;
}

if (!isset($_SESSION['signed_in']) && basename($_SERVER['PHP_SELF']) != 'singin.php' && basename($_SERVER['PHP_SELF']) != 'singun.php' && basename($_SERVER['PHP_SELF']) != 'admin_auth.php' && basename($_SERVER['PHP_SELF']) != './php/signout.php') {
  header("location: index.php");
  exit;
}

?>


<!DOCTYPE html>
<html class="relative min-h-full h-full">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="css/output.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/custom.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body class=" bg-gray-100 min-h-full h-full dark:bg-black">
  <?php include './php/connect.php' ?>