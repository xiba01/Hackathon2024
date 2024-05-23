<?php
require '../fpdf186/fpdf.php';
include '../php/connect.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('../asset/images/Logo/ofppt-logo.png', 10, 10, 35);

// Set title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'OFPPT Copains d\'Avant', 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 10, 'List des Laureats inscrits', 0, 1, 'C');
$pdf->Ln(25);

// Fetch data from database
$query = "SELECT * FROM Laureat where valide = 1";
$result = $db->query($query);

// Table header
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(23, 10, 'Nom', 1);
$pdf->Cell(37, 10, 'Prenom', 1);
$pdf->Cell(60, 10, 'Email', 1);
$pdf->Cell(27, 10, 'Tel', 1);
$pdf->Cell(15, 10, 'Promo', 1);
$pdf->Cell(17, 10, 'Fillier', 1);
$pdf->Cell(17, 10, 'Etab', 1);
$pdf->Ln();

// Table data
$pdf->SetFont('Arial', '', 12);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(23, 10, $row['nom'], 1);
    $pdf->Cell(37, 10, $row['Prenom'], 1);
    $pdf->Cell(60, 10, $row['email'], 1);
    $pdf->Cell(27, 10, $row['Tel'], 1);
    $pdf->Cell(15, 10, $row['promotion'], 1);
    $pdf->Cell(17, 10, $row['Filiere'], 1);
    $pdf->Cell(17, 10, $row['Etablissement'], 1);

    $pdf->Ln();
}

// Output PDF
$pdf->Output();
?>

