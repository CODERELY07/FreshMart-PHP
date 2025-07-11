<?php 
    require './../includes/config.php';    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './../vendor/autoload.php'; 

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USERNAME;
        $mail->Password   = SMTP_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = SMTP_PORT;

        // Recipients
        $mail->setFrom('calipjo.markely@gmail.com', 'Fresh Mart');
        $mail->addAddress($email, "$first $last");

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Verify Your Email';
        $mail->Body    = "
            <h1>Verify Your Email</h1>
            <p>Hi $first,</p>
            <p>Thank you for registerint/verifg. Please click the link below to verify your email:</p>
            <a href='http://localhost/freshMart/actions/verify.php?code=$verification_code'>Verify Now</a>
            <p>This link will expire in 1 hour.</p>
        ";

        $mail->send();
    } catch (Exception $e) {
        // Log error or show friendly message
        $_SESSION['signup_errors'] = ['email' => 'Verification email could not be sent. Please contact support.'];
        $_SESSION['signup_old'] = $_POST;
        redirect('signup');
        exit;
    }
?>