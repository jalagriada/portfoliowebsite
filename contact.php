<?php
// contact.php - POST handler for the contact form
// Expects name, email, subject, message in POST and uses config.php for DB credentials.

require_once __DIR__ . '/config.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

// Retrieve and sanitize inputs
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

$errors = [];

// Basic validation
if ($name === '') {
    $errors['name'] = 'Name is required';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'A valid email is required';
}
if ($message === '') {
    $errors['message'] = 'Message is required';
}

// Limit lengths
if (mb_strlen($name) > 255) $errors['name'] = 'Name too long';
if (mb_strlen($email) > 255) $errors['email'] = 'Email too long';
if (mb_strlen($subject) > 255) $errors['subject'] = 'Subject too long';

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $pdo_options);

    $sql = "INSERT INTO `messages` (`name`, `email`, `subject`, `message`) VALUES (:name, :email, :subject, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':subject' => $subject !== '' ? $subject : null,
        ':message' => $message,
    ]);

    $insertId = $pdo->lastInsertId();

    echo json_encode(['success' => true, 'id' => $insertId]);
    exit;
} catch (PDOException $e) {
    // Write the real error to the Apache/PHP error log for debugging
    error_log('contact.php DB error: ' . $e->getMessage());

    // Return a generic message to the client
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database error']);
    exit;
}