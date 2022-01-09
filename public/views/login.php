<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <title>Login</title>

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
                <form class="login" action="login" method="POST">
                    <input name="email" id="mail_input" type = "text" class = "mail" placeholder="E-mail">
                    <input name="password" id="password_input" type = "password" class = "password" placeholder="Password">
                    <button type="submit" class="log_in"> Log in </button>
                    <button class="sign_in"> Sign in </button>
                    <div class = "or">
                        <div></div>
                        <p>Or</p>
                        <div></div>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>