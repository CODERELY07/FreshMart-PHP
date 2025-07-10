<?php
    if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
        require_once 'connection.php';

        $token = $_COOKIE['remember_token'];
        $token_hash = hash('sha256', $token);

        $stmt = $pdo->prepare("SELECT user_id FROM remember_tokens WHERE token_hash = :token_hash AND expires_at > NOW()");
        $stmt->execute([':token_hash' => $token_hash]);
        $row = $stmt->fetch();

        if ($row) {
            $_SESSION['user_id'] = $row['user_id'];
        } else {
            setcookie('remember_token', '', time() - 3600, '/');
        }
    }
?>