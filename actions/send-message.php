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
    $date = date("Y/M/D") ;
    global $conn;
    try {
        if ($first_name == '' or $last_name == '' or $phone == '' or $email == '' or $message == '') {
            header('location: ../index.php?empty=ok');
        } else {
            $query = "INSERT INTO users SET first_name=?, last_name=?, phone_number=?, email=?, message=?, send-at=?";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $first_name);
            $stmt->bindValue(2, $first_name);
            $stmt->bindValue(3, $phone);
            $stmt->bindValue(4, $email);
            $stmt->bindValue(5, $message);
            $stmt->bindValue(6, $date);
            $stmt->execute();

            $to = "Yoyr email";
            $subject = "Somebody wants to contact you";
            $message = "Name : $first_name $first_name\n";
            $message .= "Phone number = $phone";
            $message .= "Email = $email";
            $message .= "Message = $message";
            $message .= "Sent at = $date";
            $res = mail($to, $subject, $message);
            if ($res) {
            header("location: ../index.php?send=true");
        }
        else{
            header("location: ../index.php?error=ok");
        }
        }
    } catch (PDOException $error) {
        echo "errors: " . $error->getMessage();
    }
}
