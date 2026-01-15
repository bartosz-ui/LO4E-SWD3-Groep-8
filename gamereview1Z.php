<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bartosz Zielinski">
    <!-- font link code -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Boldonse&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet/index.css">
    <title>Gamestar - PEGI 7 Reviews (PHP)</title>
</head>

<body>

    <header>
        <nav>
            <a href="index.html"><img src="images/logo.jpg" alt="logo" id="logoimg"></a>
            <h3 id="logoname">Gamestars</h3>
            <ul id="nav-links">
                <li><a class="headerurls" href="gamesmodule.html">games</a></li>
                <li><a class="headerurls" href="merchandise.html">merchandise</a></li>
                <li><a class="headerurls" href="contacts.html">contact</a></li>
                <li><a class="headerurls" href="reviews.html">reviews</a></li>
                <li><input type="text" id="searchBar" placeholder="Search..." /></li>
                <li><a href="register.html" id="register-button">Register</a></li>
            </ul>
        </nav>
    </header>


   <?php
$games = [
    "mario_galaxy" => [
        "titel" => "Super Mario Galaxy",
        "genres" => ["Platformer", "Adventure", "Family"],
        "fotos" => [
            "images/mariogalaxy1.jpg",
            "images/mariogalaxy2.jpg",
            "images/mariogalaxy3.jpg"
        ],
        "pegi" => 7,
        "beschrijving" => "Super Mario Galaxy is een kleurrijke platformgame waarin Mario door verschillende sterrenstelsels reist om Princess Peach te redden.",
        "trailer" => "https://www.youtube.com/embed/rmN8DHZYNCg",
        "platforms" => ["Nintendo Wii", "Nintendo Switch"],
        "maker" => "Nintendo",
        "reviews" => [
            ["naam" => "Anna", "rating" => 5, "review" => "Magisch en tijdloos. Een van de beste Mario-games ooit."],
            ["naam" => "Bram", "rating" => 5, "review" => "Fantastisch leveldesign en muziek."],
            ["naam" => "Clara", "rating" => 4, "review" => "Heel leuk voor jong en oud."]
        ]
    ],

    "zelda_botw" => [
        "titel" => "The Legend of Zelda: Breath of the Wild",
        "genres" => ["Action-Adventure", "Open World", "RPG"],
        "fotos" => [
            "images/zelda1.jpg",
            "images/zelda2.jpg",
            "images/zelda3.jpg"
        ],
        "pegi" => 7,
        "beschrijving" => "Breath of the Wild is een open-wereld avontuur waarin Link het koninkrijk Hyrule verkent en zijn eigen pad kiest.",
        "trailer" => "https://www.youtube.com/embed/zw47_q9wbBE",
        "platforms" => ["Nintendo Switch", "Wii U"],
        "maker" => "Nintendo",
        "reviews" => [
            ["naam" => "David", "rating" => 5, "review" => "Vrijheid zoals nooit tevoren. Meesterwerk."],
            ["naam" => "Eva", "rating" => 5, "review" => "Prachtige wereld en geweldige gameplay."],
            ["naam" => "Finn", "rating" => 4, "review" => "Zeer goed, maar soms lastig."]
        ]
    ]
];

$gekozenGame = "mario_galaxy";
$leeftijd = 7;

$game = $games[$gekozenGame];

if ($leeftijd < $game["pegi"]) {
    echo "Je bent helaas te jong voor deze game. PEGI: {$game['pegi']}.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Gamestars</title>
    <link rel="stylesheet" href="stylesheet/index.css">
</head>

<body>

<section class="game-container">
    <section class="left-column">
        <section id="slideshow">
            <?php foreach ($game["fotos"] as $foto) echo "<article><img src='$foto'></article>"; ?>
        </section>

        <section class="user-reviews">
            <h3>Gebruikersreviews:</h3>
            <?php
            foreach ($game["reviews"] as $rev) {
                echo "<div class='review'>";
                echo "<strong>{$rev['naam']}</strong> - {$rev['rating']}/5";
                echo "<p>{$rev['review']}</p>";
                echo "</div><hr>";
            }
            ?>
        </section>
    </section>

    <section class="game-info">
        <h1><?= $game['titel'] ?></h1>
        <strong>PEGI:</strong> <?= $game['pegi'] ?><br>

        <strong>Genres:</strong><br>
        <?php foreach ($game["genres"] as $genre) echo "- $genre<br>"; ?>

        <br><strong>Platforms:</strong><br>
        <?php foreach ($game["platforms"] as $platform) echo "- $platform<br>"; ?>

        <br><strong>Beschrijving:</strong><br>
        <?= $game['beschrijving'] ?><br><br>

        <strong>Maker:</strong> <?= $game['maker'] ?><br><br>

        <strong>Trailer:</strong><br>
        <iframe width="400" height="225" src="<?= $game['trailer'] ?>"></iframe>
    </section>
</section>

</body>

    <script>
        const articles = document.querySelectorAll("#slideshow article");
        let index = 0;

        function showArticle(i) {
            articles.forEach(a => a.classList.remove("active"));
            if (articles[i]) articles[i].classList.add("active");
        }

        if (articles.length > 0) {
            showArticle(index);
            setInterval(() => {
                index = (index + 1) % articles.length;
                showArticle(index);
            }, 3000);
        }
    </script>

    <footer>
        <p>© 2024 Gamestars. All rights reserved.</p>
    </footer>
</body>
</html>