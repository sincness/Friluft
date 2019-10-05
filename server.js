const mysql = require('mysql');
const cors = require('cors');
const bodyParser = require('body-parser');
var express = require('express');


var app = express({ mode: 'cors' });
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

const connect = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'db'
});

let SELECT_ALL_USERS = '';

app.post('/api/geturl', function (req, res, next) {
  SELECT_ALL_USERS = `SELECT * FROM users WHERE id = '${req.body.url}'`;
  next()
});

app.get('/api/profile', (req, res) => {
  connect.query(SELECT_ALL_USERS, (err, result) => {
    if (err) {
      return res.send(err);
    } else {
      return res.json({
        data: result
      });
    }
  });
});

var port = process.env.PORT || 5000;
app.listen(port, () => `Server running on port ${port}`);