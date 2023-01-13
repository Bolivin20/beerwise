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
        <img src="public/uploads/<?= $beer->getImage(); ?>">
        <rating>
         <i class="fa-solid fa-star"></i>
         <t>Rating:</t>
         <b>8.21/10</b>
         </rating>
        <b>
            <i class="fa-solid fa-arrow-left"></i>
            <bck>Back</bck>
        </b>
    </div>
    <div class="rightside">
        <name >
            <t>name:</t>
            <b><?= $beer->getTitle(); ?></b>
        </name>

        <brewery>
            <t>brewery:</t>
            <b><?= $beer->getBrewery(); ?></b>
        </brewery>

        <type>
            <t> style: </t>
            <b><?= $beer->getStyle(); ?></b>
        </type>

        <alcohol>
            <t>alcohol:</t>
            <b><?= $beer->getAbv(); ?></b>
        </alcohol>

        <description>
            <t>description:</t>
            <div class="des">
                <b2><?= $beer->getDescription(); ?></b2>
                </div>
        </description>

        <rate>
                <input name="beer" type="text" placeholder="Rate this beer here...">           
            <b>
                <i class="fa-solid fa-plus"></i>
                <rt>Rate</rt> 
            </b>
        </rate>

    </div>
    </div>
</body>