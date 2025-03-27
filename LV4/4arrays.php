<?php
function arrayCount($array)
{
    return count($array);
}

function arrayKey($array)
{
    return array_keys($array);
}

function arrayValue($array)
{
    return array_values($array);
}

function arrayHeader($array)
{
    $header = "<tr>";
    foreach (array_keys($array) as $key) {
        $header .= "<th>" . ucfirst(htmlspecialchars($key)) . "</th>";
    }
    $header .= "</tr>";
    return $header;
}

function arrayRow($array)
{
    $row = "<tr>";
    foreach ($array as $value) {
        $row .= "<td>" . htmlspecialchars($value) . "</td>";
    }
    $row .= "</tr>";
    return $row;
}

$korisnik = [
    'ime' => 'Mario',
    'prezime' => 'Kušević',
    'OIB' => 65822145815,
    'email' => 'mkusevic@vub.hr',
    'godiste' => 1999
];

echo "<h2>Rezultati funkcija:</h2>";

echo "<h3>arrayCount:</h3>";
echo arrayCount($korisnik);

echo "<h3>arrayKey:</h3>";
echo "<pre>";
print_r(arrayKey($korisnik));
echo "</pre>";

echo "<h3>arrayValue:</h3>";
echo "<pre>";
print_r(arrayValue($korisnik));
echo "</pre>";

echo "<h3>HTML tablica:</h3>";
echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo arrayHeader($korisnik);
echo arrayRow($korisnik);
echo "</table>";
?>