<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
    <title>BeerWise</title>
    <script src="https://kit.fontawesome.com/5d4765dc9e.js" crossorigin="anonymous"></script>
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

    <section class = "menu">
        <table>
            <?php
            foreach($beers as $beer) {
                echo '<tr>';
                echo '<td><img src="public/uploads/'.$beer->getImage().'"></td>';
                echo '<td>'.$beer->getTitle().'</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <pusty></pusty>
        <table>
            <?php
            foreach($beers as $beer) {
                echo '<tr>';
                echo '<td><img src="public/uploads/'.$beer->getImage().'"></td>';
                echo '<td>'.$beer->getTitle().'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </section>


    <options>
        <form method="post" action="addBeer">
            <button type="submit">
                <i class="fa-solid fa-plus"></i>
                <b>Add beer</b>
            </button>
        </form>
        <form method="post" action="ratingsPage">
            <button type="submit">
                <i class="fa-solid fa-star"></i>
                <b>Ratings</b>
            </button>
        </form>

    </options>
</div>
</body>