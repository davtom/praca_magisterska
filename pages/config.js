const mysql = require('mysql');

// Tworzenie połączenia z bazą danych
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'd4vez'
});

// Nawiązanie połączenia
connection.connect((err) => {
  if (err) {
    console.error('Błąd połączenia z bazą danych: ' + err.stack);
    return;
  }
  console.log('Połączono z bazą danych.');
});