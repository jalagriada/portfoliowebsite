<?php
// DB config for local XAMPP environment
// Edit these values if your MySQL credentials differ.
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'port_db');
define('DB_USER', 'root');
define('DB_PASS', ''); // XAMPP default is empty password

// PDO options
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];