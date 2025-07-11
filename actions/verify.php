<?php
    date_default_timezone_set('UTC');
    require './../connection.php';
    require './../includes/helpers.php';

    $code = $_GET['code'] ?? '';

    if ($code) {
         $current_time = date('Y-m-d H:i:s');

    
        $stmt = $pdo->prepare("
            SELECT * FROM users 
            WHERE verification_code = :code 
            AND verification_expiry >= :now
        ");

        $stmt->execute([
            ':code' => $code,
            ':now'  => $current_time
        ]);
        $user = $stmt->fetch();
        
        if ($user) {
            $update = $pdo->prepare("UPDATE users SET is_verified = 1, verification_code = NULL, verification_expiry = NULL WHERE user_id = :id");
            $update->execute([':id' => $user['user_id']]);

            $_SESSION['success'] = "Email verified! You may now log in.";
            redirect('signin');
        } else {
            echo "Invalid or expired verification code.";
        }
    } else {
        echo "No verification code provided.";
    }
