<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/ratings.css">
    <title>Ratings</title>
    <script src="https://kit.fontawesome.com/5d4765dc9e.js" crossorigin="anonymous"></script>
    <script type=" text/javascript" src="public/js/stylesRating.js" defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <img src="public/img/logo.svg">
        <div class="choosing">
            <s1>
                <t>Choose beer's style</t>
                <i class="fa-solid fa-chevron-down"></i>
            </s1>
            <s2>
                <button>Pils</button>
                <button>IPA</button>
                <button>Stout</button>  
                <button>Lager</button>
                <button>Wheat</button>
                <button>Porter</button>
            </s2>
        </div>
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
                        <td><?=$i++; ?></td>
                        <td><img src="public/uploads/<?= $beer->getImage(); ?>"></td>
                        <td><?= $beer->getTitle(); ?></td>
                        <td><?= $beer->getRate(); ?>/10</td>
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
                        <td><?=$i++; ?></td>
                        <td><?= $brewery->getName(); ?></td>
                        <td><?= $brewery->getRate(); ?>/10</td>
                    </tr>
                    <?php endforeach; ?>
                </table>
        </div>
        </div>

    </div>

    <div class="panel">
        <b>
            <i class="fa-solid fa-arrow-left"></i>
            <bck>Back</bck>
        </b>
    </div>
</body>