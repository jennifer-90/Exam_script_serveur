<?php


/**
 * @param string $champs
 * @param string $valuesPost
 * @return bool
 */
function userExist(string $champs, string $valuesPost):bool {

    $connexion = connexion();

    $sql = "SELECT $champs FROM user WHERE $champs = ?";

    $query = $connexion->prepare($sql);
    $query->execute([$valuesPost]);

    $result = $query->fetchAll();

    return count($result) > 0;
}


/*-----------------------------------------------------*/

/**
 * @param $session
 * @return true|void
 */
function menuAdmin($session){

    $connexion = connexion();

    $query = $connexion->prepare("SELECT admin FROM user WHERE id = ?");
    $query->bindValue(1, $session);
    $query->execute();
    $result = $query->fetchColumn();

    if ($result == 1) {
        return true;
    }
};

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


/*-----------------------------------------------------*/

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

/*-----------------------------------------------------*/

function changeDate(string $date){
    return date_format(new DateTime($date),'d/m/Y - H\hi -s\s');
}