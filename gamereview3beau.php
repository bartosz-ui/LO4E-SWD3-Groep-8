<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Beau Mensink">
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
    "mario_party" => [
        "titel" => "Super Mario Party",
        "genres" => ["Party", "Multiplayer", "Family"],
        "fotos" => ["images/sprmarioparty1.jpeg", "images/sprmarioparty2.png", "images/sprmarioparty3.jpeg"],
        "pegi" => 3,
        "beschrijving" => "Een vrolijke partygame waarin spelers strijden in tientallen minigames.",
        "rating" => 8.2,
        "trailer" =>  "https://www.youtube.com/embed/by_XTria-mQ?si=2n6TBs6ErL8B5DtY",
        "platforms" => ["Nintendo Switch"],
        "maker" => "Nintendo"
    ],
    "hokko_life" => [
        "titel" => "Hokko Life",
        "genres" => ["life sim", "Creatief", "Relaxing"],
        "fotos" => ["images/hokko life 2.jpeg", "images/hokko life1.jpeg", "images/hokko life 3.jpeg"],
        "pegi" => 3,
        "beschrijving" => "Een rustige life-sim waar je huizen bouwt, ontwerpt en een dorp nieuw leven inblaast.",
        "rating" => 7.4,
        "trailer" => "https://www.youtube.com/embed/_VE7e64fW6w?si=AxWnOM51T5YrCzQZ",
        "platforms" => ["PC", "Nintendo Switch", "PlayStation", "Xbox"],
        "maker" => "Wonderscope"
    ]
];

$gekozenGame = "hokko_life"; 
$leeftijd = 5;

switch ($gekozenGame) {
    case "mario_party":
        $game = $games["mario_party"];
        break;
    case "hokko_life":
        $game = $games["hokko_life"];
        break;
}

if ($leeftijd < $game["pegi"]) {
    echo "Je bent helaas te jong voor deze game. PEGI: {$game['pegi']}.<br>";
    exit;
}

echo '<section class="game-container">';
echo '<section class="left-column">';

echo '<section id="slideshow">';
foreach ($game["fotos"] as $foto) {
    echo "<article><img src='{$foto}' alt='{$game['titel']}'></article>";
}
echo '</section>';

echo '<section class="rating-section">';
echo "<strong>Rating:</strong> {$game['rating']} / 10<br>";
echo "<strong>Metascore:</strong> 85 / 100<br>";
echo "<strong>Review:</strong>";
echo "<p>Leuke, toegankelijke gameplay met kleurrijke visuals. Perfect voor families en vrienden.</p>";
echo '</section>';

echo '</section>';

echo '<section class="game-info">';
echo "<h1>{$game['titel']}</h1>";
echo "<strong>Genres:</strong><br>";
foreach ($game["genres"] as $genre) {
    echo "- {$genre}<br>";
}
echo "<br><strong>Platforms:</strong><br>";
foreach ($game["platforms"] as $platform) {
    echo "- {$platform}<br>";
}
echo "<br><strong>Beschrijving:</strong><br>";
echo "{$game['beschrijving']}<br><br>";
echo "<br><strong>Trailer:</strong><br>";
echo "<iframe width='400' height='225' src='{$game['trailer']}'></iframe>";
echo '</section>';

echo '</section>';
?>

<script>
const articles = document.querySelectorAll("#slideshow article");
let index = 0;

function showArticle(i) {
    articles.forEach(a => a.classList.remove("active"));
    articles[i].classList.add("active");
}

showArticle(index);

setInterval(() => {
    index = (index + 1) % articles.length;
    showArticle(index);
}, 3000);
</script>

<footer>
    <p>© 2024 Gamestars. All rights reserved.</p>
</footer>

</body>
</html>
