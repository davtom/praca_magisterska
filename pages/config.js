const express = require('express')
const bodyParser = require('body-parser')
const mysql = require('mysql')

const app = express()
const port = process.env.PORT || 5000;

// Parsing middleware
// Parse application/x-www-form-urlencoded
// app.use(bodyParser.urlencoded({ extended: false })); // Remove 
app.use(express.urlencoded({extended: true})); // New
// Parse application/json
// app.use(bodyParser.json()); // Remove
app.use(express.json()); // New

// Tworzenie połączenia z bazą danych
const connection = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'd4vez'
});

app.get('/:id', (req, res) => {
    connection.getConnection((err, connection) => {
        if(err) throw err
        connection.query('SELECT * FROM users WHERE id = ?', [req.params.id], (err, rows) => {
            connection.release() // return the connection to pool
            if (!err) {
                res.send(rows)
            } else {
                console.log(err)
            }
            
            console.log('The data from beer table are: \n', rows)
        })
    })
});

app.listen(port, () => console.log(`Listening on port ${port}`))