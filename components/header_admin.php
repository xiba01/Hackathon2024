<?php
session_start();
?>
<!DOCTYPE html>
<html class="relative min-h-full h-full">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
    if (basename($_SERVER['PHP_SELF']) == 'dashboard.php') {
        include_once('components/charts.php');
    }
    ?>
</head>

<body class=" bg-gray-100 min-h-full h-full dark:bg-black">
    <?php include './php/connect.php'; ?>