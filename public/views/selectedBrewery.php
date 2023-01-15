<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/searched.css">
    <title>Searched item</title>
    <script src="https://kit.fontawesome.com/5d4765dc9e.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
<div class="base-container">

    <div class="leftside">
        <?php ?>
        <rating>
            <i class="fa-solid fa-star"></i>
            <t>Rating:</t>
            <b><?= $brewery->getRate(); ?>/10</b>
        </rating>
        <b>
            <i class="fa-solid fa-arrow-left"></i>
            <bck>Back</bck>
        </b>
    </div>
    <div class="rightside">
        <name >
            <t>name:</t>
            <b><?= $brewery->getName(); ?></b>
        </name>
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

    </div>
</div>
</body>