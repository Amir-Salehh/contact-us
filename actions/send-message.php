<?php

require_once ('../database/database.php');
use PHPMailer\PHPMailer\PHPMailer;
require_once ("../vendor/autoload.php");

if(isset($_POST['send'])) {
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    global $conn;
    try {
        if ($first_name == '' or $last_name == '' or $phone == '' or $email == '' or $message == '') {
            header('location: ../index.php?empty=ok');
        } else {
            $query = "INSERT INTO users SET first_name=?, last_name=?, phone_number=?, email=?, message=?";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $first_name);
            $stmt->bindValue(2, $last_name);
            $stmt->bindValue(3, $phone);
            $stmt->bindValue(4, $email);
            $stmt->bindValue(5, $message);
            $stmt->execute();

            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = "Your email";
            $mail->Password = "Your email password";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom("Your email", 'Your name');
                //  To save that person's information, it must be sent to your email address.
            $mail->addAddress("Your email");

            $mail->isHTML(true);

            $mail->Subject =  "$first_name $last_name information";
            $mail->Body    = "<b>name: $first_name $last_name\n\nphone number: $phone\n\nemail: $email\n\nmessage: $message</b>";

            try {
                $mail->send();
                header("location: ../index.php?sent=ok");

            } catch (\PHPMailer\PHPMailer\Exception $e) {
                echo 'Mailer Error: ' . $e->getMessage();
            }

        }
    } catch (PDOException $error) {
        echo "errors: " . $error->getMessage();
    }
}