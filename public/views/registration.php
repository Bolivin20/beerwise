<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/adding.css">
    <title>Registration</title>
    <script src="https://kit.fontawesome.com/5d4765dc9e.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
<div class="base">
    <div class="left">
        <sen>Registration.</sen>
        <form action="register" method="post">
            <input name="name" type="text" placeholder="Name">
            <input name="surname" type="text" placeholder="Surname">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password2" placeholder="Repeat password">

            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <button type="submit">Register</button>
        </form>

    </div>
</div>
</body>