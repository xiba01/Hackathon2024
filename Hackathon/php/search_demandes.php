<?php
// Include database connection
include 'connect.php';

if (isset($_GET['search']) && isset($_GET['order'])) {
    $search = $_GET['search'];
    $order = $_GET['order'];

    // Determine the column to order by
    switch ($order) {
        case 'nom':
            $column = 'nom';
            break;
        case 'etab':
            $column = 'EFP.LibelleE';
            break;
        case 'promotion':
            $column = 'promotion';
            break;
        case 'promotion_d':
            $column = 'promotion DESC'; 
            break;
        case 'fili':
            $column = 'Filiere.LibelleF'; 
            break;
        default:
            $column = 'nom';
            break;
    }

    // Prepare the base query
    $query = "SELECT 
                Identifiant,
                nom,
                Prenom,
                email,
                Tel,
                promotion,
                Fonction,
                Employeur,
                valide,
                Filiere.LibelleF AS Filiere,
                EFP.LibelleE AS Etablissement
              FROM 
                Laureat
              INNER JOIN 
                Filiere ON Laureat.Filiere = Filiere.CodeF
              INNER JOIN 
                EFP ON Laureat.Etablissement = EFP.CodeE
              WHERE 
                Laureat.valide = 0 ";

    // Add the search condition if the search term is provided
    if (!empty($search)) {
        $query .= "AND (nom LIKE :search OR Prenom LIKE :search OR email LIKE :search 
                  OR Tel LIKE :search OR promotion LIKE :search OR Filiere.LibelleF LIKE :search 
                  OR EFP.LibelleE LIKE :search) ";
    }

    // Append the order by clause
    $query .= "ORDER BY $column";

    // Prepare the statement
    $stmt = $db->prepare($query);

    // Bind the search parameter if the search term is provided
    if (!empty($search)) {
        $searchParam = "%" . $search . "%";
        $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
    }

    // Execute the statement
    $stmt->execute();

    // Fetch all results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the results as JSON
    echo json_encode($results);
}
?>