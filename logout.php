<?php
    session_start();
    session_unset();
    session_destroy();

    if (isset($_COOKIE['remember_token'])) {
        require_once 'connection.php';
        $token_hash = hash('sha256', $_COOKIE['remember_token']);
        $stmt = $pdo->prepare("DELETE FROM remember_tokens WHERE token_hash = :token_hash");
        $stmt->execute([':token_hash' => $token_hash]);

        setcookie('remember_token', '', time() - 3600, '/');
    }

    header("Location: signin.php");
    exit;

?>