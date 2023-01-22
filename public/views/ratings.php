<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/ratings.css">
    <title>Ratings</title>
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
<div class="header">
    <img src="public/img/logo.svg">
</div>

<div class="ratings">
    <div class="beers">
        <b>
            <t>Top 5 beers:</t>
        </b>
        <div class="table">
            <table>
                <?php $i = 1;
                foreach ($beers as $beer):?>
                    <tr>
                        <td><?= $i++; ?>.</td>
                        <td><img src="public/uploads/<?= $beer->getImage(); ?>"></td>
                        <td><?= $beer->getTitle(); ?></td>
                        <td><?= round($beer->getRate(), 2); ?>/10</td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="breweries">
        <b>
            <t>Top 5 breweries:</t>
        </b>
        <div class="table">
            <table>
                <?php $i = 1;
                foreach ($breweries as $brewery):?>
                    <tr>
                        <td><?= $i++; ?>.</td>
                        <td><?= $brewery->getName(); ?></td>
                        <td><?= round($brewery->getRate(), 2); ?>/10</td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</div>
</body>