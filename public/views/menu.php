<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <title>BeerWise</title>
    <script src="https://kit.fontawesome.com/5d4765dc9e.js" crossorigin="anonymous"></script>
    <script type=" text/javascript" src="public/js/searchBeer.js" defer></script>
    <script type=" text/javascript" src="public/js/searchBrewery.js" defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
<div class="base-container">
    <panel>
        <i class="fa-regular fa-user"></i>
        <form action="logout" method="get">
            <button type="submit">Logout</button>
        </form>

    </panel>

    <header>
        <img src="public/img/logo.svg">
        <f>
            <b1>
                <i class="fa-solid fa-magnifying-glass"></i>
                <input name="beer" type="text" placeholder="Discover beer here...">
            </b1>
            <b1>
                <i class="fa-solid fa-magnifying-glass"></i>
                <input name="brewery" type="text" placeholder="Discover brewery here...">
            </b1>
        </f>

    </header>

<div class="content">
    <section class = "beers">
        <?php foreach ($beers as $beer): ?>
            <div class="component">
                <form action="selected" method="get">
                <img src="public/uploads/<?= $beer->getImage(); ?>">
                    <button type="submit" id="selected">
                        <input type="hidden" name="title" value="<?= $beer->getTitle(); ?>">
                        <b><?= $beer->getTitle(); ?></b>
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
        </section>
    <section class = "breweries">
        <?php foreach ($breweries as $brewery): ?>
        <div class="component">
            <form action="selectedBrewery" method="get">
                <button type="submit" id="selectedBrewery">
                <b><?= $brewery->getName(); ?></b>
                <input type="hidden" name="name" value="<?= $brewery->getName(); ?>">
                </button>
            </form>
        </div>
        <?php endforeach; ?>
    </section>

</div>

    <options>
        <form method="post" action="addBeer">
            <button type="submit">
                <i class="fa-solid fa-plus"></i>
                <b>Add beer</b>
            </button>
        </form>
        <?php
        if(isset($messages)){
            foreach($messages as $message) {
                echo $message;
            }
        }
        ?>
        <form method="get" action="ratings">
            <button type="submit">
                <i class="fa-solid fa-star"></i>
                <b>Ratings</b>
            </button>
        </form>

    </options>
</div>
</body>

<template id="beerSearch-template">
        <div class="component">
            <form action="selected" method="get">
            <img src="">
                <button type="submit" id="selected">
            <b></b>
                    <input type="hidden" name="title" value="">
                </button>
            </form>
        </div>
</template>
<template id="brewerySearch-template">
        <div class="component">
            <form action="selectedBrewery" method="get">
                <button type="submit" id="selectedBrewery">
                <b></b>
                <input type="hidden" name="name" value="">
                </button>
            </form>
        </div>
</template>