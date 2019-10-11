const r = require('rethinkdb');
const express = require('express');
const bodyParser = require('body-Parser');
const bcrypt = require('bcrypt');


const app = express({ mode: 'cors' });
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
let connection = '';
r.connect({ host: 'localhost', port: 28015 }, function (err, conn) {
  if (err) throw err;
  connection = conn;
});
//------------ 
//profile
//------------ 
let url = '';
app.post('/api/geturl', function (req, res, next) {
  url = req.body.url;
  next();
});

let urlProduct = '';
app.post('/api/products', function (req, res, next) {
  urlProduct = req.body.url;
  console.log(urlProduct);
  next();
});
//------------ 
//Create article
//------------ 
app.post('/api/products', function (req, res, next) {
  console.log(req.body);
  r.db('db').table('products').insert(
    {
      header: req.body.header,
      category: req.body.category,
      desc: req.body.desc,
    }
  )
  .run(connection, function (err) {
    if (err) throw err;
  });
  next();
});
//------------ 
//Create account
//------------ 
app.post('/api/register', function (req, res, next) {
  const saltRounds = 10;
  bcrypt.hash(req.body.password, saltRounds, function(err, hash){
  
  r.db('db').table('users').insert(
    {
      fullname: req.body.fullname,
      email: req.body.email,
      password: hash,
      address: req.body.address,
      postnumber: req.body.postnumber,
      city: req.body.city,
      phone: req.body.phone
      
    }
  )
  
  .run(connection, function (err) {
    if (err) throw err;
  });
});
  next();
});

app.post('/api/login', (req, res) => {
  const user = r.db('db').table('users').filter({ email: req.body.email}).run(connection, (err, cursor) => {
    cursor.toArray(function (err, result) {

    })
    .then(result =>  {      
       if(bcrypt.compareSync(req.body.password, result.password)){
        console.log('You logged in.');
        res.redirect('/');
       }
    })
  })
})



app.get('/api/profile', function (req, res) {
  r.db('db').table('users').filter({ id: url }).run(connection, function (err, cursor) {
    if (err) throw err;
    cursor.toArray(function (err, result) {
      if (err) throw err;
      return res.json({
        data: result
      });
    });
  });
});

//------------ 
//Search
//------------ 
let searchInput = '';
app.get('/api/search', function (req, res, next) {
  r.db('db').table('users').run(connection, function (err, cursor) {
    if (err) throw err;
    cursor.toArray(function (err, result) {
      if (err) throw err;
      console.log(result);
      return res.json({
        data: result
      });
    });
  });
  // searchInput = req.body.search;
});

// app.get('/api/search', function (req, res, next) {
//   console.log(searchInput);
//   r.db('db').table('users').filter(function(doc){
//     return doc('username').match('jesper')}).run(connection, function (err, cursor) {
//     if (err) throw err;
//     cursor.toArray(function (err, result) {
//       console.log(result);
//       if (err) throw err;
//       return res.json({
//         searchData: result
//       });
//     });
//     next();
//   });
// });


// app.all('/api/search', function (req, res, next) {
//   if (req.body.search) {
//   r.db('db').table('users').filter(function(doc){
//     return doc('username').match('jesper')}).run(connection, function (err, cursor) {
//     if (err) throw err;
//     cursor.toArray(function (err, result) {
//       console.log(result[0].username);
//       if (err) throw err;
//       return res.json({
//         data: result[0].username
//       });
//     });
//   });
//   next();
// }
// });

let port = process.env.PORT || 5000;
app.listen(port, () => `Server running on port ${port}`);