<?php
    require_once ('database/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link type="text/css" href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<div class="bg-contact2" style="background-image: url('assets/images/bg-01.jpg');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <form class="contact2-form validate-form" action="actions/send-message.php" method="post">
						<span class="contact2-form-title">
							Contact us
						</span>

                <div class="wrap-input2 validate-input" >
                    <input class="input2" type="text" name="first-name">
                    <span class="focus-input2" data-placeholder="First name"></span>
                </div>

                <div class="wrap-input2 validate-input" >
                    <input class="input2" type="text" name="last-name">
                    <span class="focus-input2" data-placeholder="Last name"></span>
                </div>

                <div class="wrap-input2 validate-input" >
                    <input class="input2" type="text" name="phone">
                    <span class="focus-input2" data-placeholder="Phone number"></span>
                </div>

                <div class="wrap-input2 validate-input" >
                    <input class="input2" type="text" name="email">
                    <span class="focus-input2" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input2 validate-input" >
                    <textarea class="input2" name="message"></textarea>
                    <span class="focus-input2" data-placeholder="Message"></span>
                </div>

                <div class="container-contact2-form-btn">
                    <div class="wrap-contact2-form-btn">
                        <div class="contact2-form-bgbtn"></div>
                        <button class="contact2-form-btn" type="submit" name="send">
                            Send
                        </button>
                    </div>
                </div>
            </form>
            <br>
            <?php if(isset($_GET['empty'])){ ?>
                <p style="width=100% ;"  class="alert alert-danger">Please fill in all fields.</p>
            <?php } if (isset($_GET['send'])){ ?>
                <p style="width:100%" class="alert alert-success">Information sent successfully</p>
            <?php } if (isset($_GET['error'])){ ?>
                <p style="width:100%" class="alert alert-danger">server error</p>
            <?php } ?>
        </div>
    </div>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>
