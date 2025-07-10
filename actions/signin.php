<?php
require './../connection.php';
include('./../includes/helpers.php');
session_start();

if (isset($_SESSION['user_id'])) {
    redirect('home');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';

    $_SESSION['signin_old'] = ['email' => $email];
    $errors = [];

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    }
    if (empty($pass)) {
        $errors['password'] = "Password is required.";
    }
    
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT user_id, password_hash FROM users WHERE email = :email");
            $stmt->execute([':email' => $email]);

            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
               if (password_verify($pass, $user['password_hash'])) {
                    $_SESSION['user_id'] = $user['user_id'];

                    if (!empty($_POST['remember-me'])) {
                        // Generate secure token
                        $token = bin2hex(random_bytes(32));
                        $token_hash = hash('sha256', $token);
                        $expires = date('Y-m-d H:i:s', strtotime('+30 days'));

                        // Store in DB
                        $stmt = $pdo->prepare("INSERT INTO remember_tokens (user_id, token_hash, expires_at) VALUES (:user_id, :token_hash, :expires_at)");
                        $stmt->execute([
                            ':user_id' => $user['user_id'],
                            ':token_hash' => $token_hash,
                            ':expires_at' => $expires
                        ]);

                        setcookie('remember_token', $token, [
                            'expires' => strtotime($expires),
                            'path' => '/',
                            'httponly' => true,
                            'secure' => true, 
                            'samesite' => 'Strict'
                        ]);
                    }

                     redirect('home');
                    exit;
                }
                else {
                    $errors['password'] = "Incorrect password.";
                }
            } else {
                $errors['email'] = "No user found with this email.";
            }
        } catch (PDOException $e) {
            $errors['email'] = "Database error: " . $e->getMessage();
        }
    }

    $_SESSION['signin_errors'] = $errors;
     redirect('signin');
    exit;
}
