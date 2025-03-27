<?php
function getInsert($data, $tableName) {
    $columns = array_keys($data);
    
    $values = array_map(function($value) {
        if (is_numeric($value)) {
            return $value;
        }
        return '"' . addslashes($value) . '"';
    }, array_values($data));
    
    $sql = "INSERT INTO $tableName (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $values) . ");";
    
    return $sql;
}

$_POST = [
    'ime' => 'Mario',
    'prezime' => 'Kušević',
    'OIB' => 65822145815,
    'email' => 'mkusevic@vub.hr',
    'godiste' => 1999
];

$insertStatement = getInsert($_POST, 'korisnici');

echo $insertStatement;
?>