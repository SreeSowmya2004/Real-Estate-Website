// server.js or index.js

const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const cors = require('cors');
const path = require('path');

const app = express();
const PORT = 8080;

app.use(cors());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Serve static frontend files
app.use(express.static(path.join(__dirname, 'public')));

// Connect to MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '', // add your MySQL password here if any
  database: 'myhome_db'
});

db.connect(err => {
  if (err) {
    console.error('Database connection failed:', err);
    return;
  }
  console.log('Connected to MySQL');
});

// Register new user
app.post('/register', (req, res) => {
  const { name, email, password } = req.body;
  const sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';
  db.query(sql, [name, email, password], (err) => {
    if (err) return res.status(500).send('Error during registration');
    res.send('User registered successfully');
  });
});

// Login user
app.post('/login', (req, res) => {
  const { email, password } = req.body;
  const sql = 'SELECT * FROM users WHERE email = ? AND password = ?';
  db.query(sql, [email, password], (err, results) => {
    if (err) return res.status(500).send('Login error');
    if (results.length > 0) {
      res.send('Login success');
    } else {
      res.status(401).send('Invalid credentials');
    }
  });
});

// Post a property
app.post('/post-property', (req, res) => {
  const { title, location, price, type, description } = req.body;
  const sql = 'INSERT INTO properties (title, location, price, type, description) VALUES (?, ?, ?, ?, ?)';
  db.query(sql, [title, location, price, type, description], (err) => {
    if (err) return res.status(500).send('Error while posting property');
    res.send('Property posted successfully');
  });
});

// Save a property
app.post('/save-property', (req, res) => {
  const { user_id, property_id } = req.body;
  const sql = 'INSERT INTO saved_properties (user_id, property_id) VALUES (?, ?)';
  db.query(sql, [user_id, property_id], (err) => {
    if (err) return res.status(500).send('Error while saving property');
    res.send('Property saved successfully');
  });
});

// Get saved properties for a user
app.get('/saved-properties', (req, res) => {
  const userId = 1; // Replace with dynamic user ID in a real scenario
  const sql = `
    SELECT p.* FROM saved_properties s
    JOIN properties p ON s.property_id = p.id
    WHERE s.user_id = ?
  `;
  db.query(sql, [userId], (err, results) => {
    if (err) return res.status(500).send('Error fetching saved properties');
    res.json(results);
  });
});

// Start server
app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});
