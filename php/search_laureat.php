<?php
// Include database connection
include 'connect.php';

if (isset($_GET['search']) && isset($_GET['type'])) {
    $search = $_GET['search'];
    $type = $_GET['type'];

    // Determine the column to search based on the type
    $column = '';
    switch ($type) {
        case 'nom':
            $column = 'nom';
            break;
        case 'Etablissement':
            $column = 'Etablissement';
            break;
        case 'promotion':
            $column = 'promotion';
            break;
        default:
            $column = 'nom';
            break;
    }
if ($column == "promotion") {
    $operation = "=";
} else {
    $operation = "LIKE";}

    // Prepare and execute the query
    $stmt = $db->prepare("SELECT * FROM Laureat WHERE $column $operation ? and valide=1");
    $searchParam = "%" . $search . "%"; 
    if ($type=='promotion') {
        $searchParam = (int)$search;
    }
    $stmt->execute([$searchParam]);

    // Fetch all results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results as JSON
    echo json_encode($results);
}
?>