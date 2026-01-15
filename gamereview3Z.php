<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bartosz Zielinski">
    <!-- font link code -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Boldonse&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet/index.css">
    <title>Gamestar</title>

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
    "dark_souls_3" => [
        "titel" => "Dark Souls III",
        "genres" => ["Action RPG", "Soulslike", "Fantasy"],
        "fotos" => [
            "images\darksoals3_1.jpg",
            "images\darksoals3_2.jpg",
            "images\darksoals3_3.jpg"
        ],
        "pegi" => 16,
        "beschrijving" => "Dark Souls III is een duistere en uitdagende action RPG waarin spelers een vervallen wereld verkennen vol gevaarlijke vijanden en epische eindbazen.",
        "trailer" => "https://www.youtube.com/embed/cWBwFhUv1-8",
        "platforms" => ["PlayStation 4", "Xbox One", "PC"],
        "maker" => "FromSoftware",
        "reviews" => [
            ["naam" => "Mark", "rating" => 5, "review" => "Een meesterwerk voor liefhebbers van uitdaging."],
            ["naam" => "Lisa", "rating" => 5, "review" => "Zwaar maar enorm bevredigend."],
            ["naam" => "Tom", "rating" => 4, "review" => "Fantastische sfeer en combat."]
        ]
    ],

    "sekiro" => [
        "titel" => "Sekiro: Shadows Die Twice",
        "genres" => ["Action", "Adventure", "Soulslike"],
        "fotos" => [
            "images/sekiro1.jpg",
            "images/sekiro2.jpg",
            "images/sekiro3.jpg"
        ],
        "pegi" => 18,
        "beschrijving" => "Sekiro: Shadows Die Twice is een intense actiegame waarin je speelt als een shinobi in feodaal Japan.",
        "trailer" => "https://www.youtube.com/embed/rXMX4YJ7Lks",
        "platforms" => ["PlayStation 4", "Xbox One", "PC"],
        "maker" => "FromSoftware",
        "reviews" => [
            ["naam" => "Jeroen", "rating" => 5, "review" => "De beste combat ooit."],
            ["naam" => "Sanne", "rating" => 5, "review" => "Extreem moeilijk maar geweldig."],
            ["naam" => "Kevin", "rating" => 4, "review" => "Niet voor beginners, wel briljant."]
        ]
    ]
];

$gekozenGame = "dark_souls_3";
$leeftijd = 16;

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

<script>
const articles = document.querySelectorAll("#slideshow article");
let index = 0;
articles[0].classList.add("active");

setInterval(() => {
    articles[index].classList.remove("active");
    index = (index + 1) % articles.length;
    articles[index].classList.add("active");
}, 3000);
</script>

</body>
</html>
