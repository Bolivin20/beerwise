<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/adding.css">
    <title>Adding</title>
    <script src="https://kit.fontawesome.com/5d4765dc9e.js" crossorigin="anonymous"></script>
    <script type=" text/javascript" src="public/js/addingValidation.js" defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
<?php
if(!isset($_COOKIE['id'])){
    header('Location: login');
    exit();
}
?>
<div class="base">
    <div class="left">
        <sen>Adding new beer.</sen>
        <form action="addBeer" method="post" enctype="multipart/form-data">

    <input name="title" type="text" placeholder="Name">
    <input name="brewery" type="text" placeholder="Brewery">
    <input name="style" type="text" placeholder="Style">
    <input name="abv" type="text" placeholder="Alcohol">
    <textarea name="description" rows="5" placeholder="Description..."></textarea>

    <input type="file" name="file">

            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
    <button type="submit">Add</button>
    </form>

</div>
</div>
</body>