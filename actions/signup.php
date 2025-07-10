<?php
include('./../includes/helpers.php');

require './../connection.php'; 
session_start();

if (isset($_SESSION['user_id'])) {
    redirect('home');
    exit;
}
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize inputs
    $first = trim($_POST['first_name'] ?? '');
    $last = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validation
    if (empty($first)) {
        $errors['first_name'] = "First name is required.";
    }

    if (empty($last)) {
        $errors['last_name'] = "Last name is required.";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    // If there are validation errors, redirect back with input and error messages
    if (!empty($errors)) {
        $_SESSION['signup_errors'] = $errors;
        $_SESSION['signup_old'] = $_POST;
        redirect('signup');
        exit;
    }

    // Proceed with database insertion
    try {
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, phone, password_hash)
                               VALUES (:first, :last, :email, :phone, :pass)");
        $stmt->execute([
            ':first' => $first,
            ':last' => $last,
            ':email' => $email,
            ':phone' => $phone,
            ':pass' => $hash
        ]);

        $_SESSION['success'] = "Registration successful. Please log in.";
        redirect('signin');
        exit;
    } catch (PDOException $e) {
        // You might want to check for duplicate email more specifically here
        $_SESSION['signup_errors'] = ['email' => "Email already exists or database error."];
        $_SESSION['signup_old'] = $_POST;
        redirect('signup');
        exit;
    }
}
