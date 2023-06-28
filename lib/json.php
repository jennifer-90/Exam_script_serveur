<?php


function exportJSON(object $user): void {
    $filename = $user->id . '_' . time() . '.json';
    // Envoi des headers HTTP au browser pour le téléchargement du fichier.
    header('Content-type: application/json');
    header('Content-disposition: attachment; filename="' . $filename . '"');
    // output du contenu au format json
    echo json_encode($user);
}

/*-----------------------------------------------------*/

/**
 * @param string $field
 * @param string $value
 * @return mixed
 */
function getUser(string $field, string $value): mixed {

    if (!in_array($field, getColumns('user'))) {
        return false;
    }
    $connexion = connexion();
    $request   = $connexion->prepare("SELECT * FROM user WHERE $field = ?");

    $params = [
        trim($value),
    ];
    $request->execute($params);
    return $request->fetchObject();
}



/**
 * @param string $table
 * @return array
 */
function getColumns(string $table): array {
    $connexion = connexion();
    $columns   = [];
    $cols      = $connexion->query("DESCRIBE " . $table, PDO::FETCH_OBJ);
    foreach ($cols as $col) {
        $columns[] = $col->Field;
    }
    return $columns;
}
