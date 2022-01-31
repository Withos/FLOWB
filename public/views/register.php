<?php
session_start();
if(isset($_SESSION["useremail"]) && isset($_SESSION["userid"])){
    header("location: ../home");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <link rel="stylesheet" type="text/css" href="/public/css/register.css">
    <script type="text/javascript" defer src="/public/js/register_validation.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <title>Register</title>

</head>
<body>
<div class = "container">
    <div class = "Logo">
        <div class = "image">
            <img src="/public/images/Logo.svg" alt="Logo" class="logo_svg">
        </div>
    </div>

    <div class = "loginform">
        <div class="messages">
            <?php if(isset ($messages)){
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <form class="login" action="register" method="POST">
            <input name="name" id="name_input" type="text" placeholder="Name">
            <input name="surname" id="surname_input" type="text" placeholder="Surname">
            <input name="date_of_birth" id="date_of_birth" type="date" min="1900-01-01">
            <input name="email" id="mail_input" type = "text" class = "mail" placeholder="E-mail">
            <input name="password" id="password_input" type = "password" class = "password" placeholder="Password">
            <input name="confirm_password" id="confirm_password_input" type="password" placeholder="Confirm password">
            <button type="submit" class="sign_in"> Sign up </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>