<?php
// Połączenie do bazy danych
$link = mysqli_connect("localhost", "root", "", "d4vez");

// Sprawdzenie połączenia
if ($link === false) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

// Zwrócenie połączenia do bazy w formacie JSON
echo json_encode([
    'status' => 'success',
    'message' => 'Połączenie do bazy danych nawiązane.',
    'connection' => $link
]);

// Zamknięcie połączenia
mysqli_close($link);
?>