<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/searched.css">
    <title>Searched item</title>
    <script src="https://kit.fontawesome.com/5d4765dc9e.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
<?php
if (!isset($_COOKIE['id'])) {
    header('Location: login');
    exit();
}
?>
<div class="base-container">

    <div class="leftside">
        <?php ?>
        <img src="public/uploads/<?= $beer->getImage(); ?>">
        <rating>
            <i class="fa-solid fa-star"></i>
            <t>Rating:</t>
            <b><?= round($beer->getRate(), 2); ?> /10</b>
        </rating>
    </div>
    <div class="rightside">
        <component>
            <t>name:</t>
            <b><?= $beer->getTitle(); ?></b>
        </component>

        <component>
            <t>brewery:</t>
            <b><?= $beer->getBrewery(); ?></b>
        </component>

        <component>
            <t> style:</t>
            <b><?= $beer->getStyle(); ?></b>
        </component>

        <component>
            <t>alcohol:</t>
            <b><?= $beer->getAbv(); ?></b>
        </component>

        <component>
            <t>description:</t>
            <div class="des">
                <b2><?= $beer->getDescription(); ?></b2>
            </div>
        </component>

        <div class="rate">
            <form action="addRate" method="post">
                <t>Rate this beer (1-10 integer):</t>
                <input name="rate" type="number" min="1" max="10" placeholder="1-10">
                <input type="hidden" name="title" value="<?= $beer->getTitle(); ?>">
                <button type="submit">
                    <i class="fa-solid fa-plus"></i>
                    <rt>Rate</rt>
                </button>
            </form>
        </div>

    </div>
</div>
</body>