<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/searched.css">
    <title>Searched item</title>
    <script src="https://kit.fontawesome.com/5d4765dc9e.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<?php
if(!isset($_COOKIE['id'])){
    header('Location: login');
    exit();
}
?>
<div class="base-container">

    <div class="leftside">
        <?php ?>
        <div class="brewname">
        <tbrew>Brewery:</tbrew>
        <namebrewery >
            <?= $brewery->getName(); ?>
        </namebrewery>
        </div>
        <ratingbrewery>
            <i class="fa-solid fa-star"></i>
            <tbrew>Rating:</tbrew>
            <b><?= round($brewery->getRate(),2); ?>/10</b>
        </ratingbrewery>
        <tbrew>Brewery's beers:</tbrew>
        <section class = "beers">
            <?php foreach ($beers as $beer): ?>
                <div class="component">
                    <form action="selected" method="get">
                        <img src="public/uploads/<?= $beer->getImage(); ?>">
                        <button type="submit" id="selected">
                            <input type="hidden" name="title" value="<?= $beer->getTitle(); ?>">
                            <bb><?= $beer->getTitle(); ?></bb>
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        </section>
</div>
</div>
</body>