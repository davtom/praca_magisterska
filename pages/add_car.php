<?php
// Połączenie do bazy danych
$link = mysqli_connect("localhost", "root", "", "d4vez");

// Sprawdzenie połączenia
if ($link === false) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

// Pobranie zapytania z parametru GET
$n_car = $_GET["n_car"];

// Wykonanie zapytania
$result = mysqli_query($link, $n_car);

// Sprawdzenie czy zapytanie się powiodło
if ($result === false) {
    die("Błąd zapytania do bazy danych: " . mysqli_error($link));
}

// Zamiana wyników na tablicę asocjacyjną i zwrócenie w formacie JSON
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
echo json_encode($rows);

// Zwolnienie wyników i zamknięcie połączenia
mysqli_free_result($result);
mysqli_close($link);
?>