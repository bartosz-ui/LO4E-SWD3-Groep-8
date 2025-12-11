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
        "spiderman2" => [
            "titel" => "Marvel's Spider-Man 2",
            "genres" => ["Action", "Adventure", "Open World"],
            "fotos" => ["images/spiderman2_1.jpg", "images/spiderman2_2.jpg", "images/spiderman2_3.jpg"],
            "pegi" => 16,
            "beschrijving" => "Peter Parker en Miles Morales beschermen New York tegen nieuwe vijanden.",
            "rating" => 9.0,
            "trailer" => "https://www.youtube.com/embed/9fVYKsEmuRo",
            "platforms" => ["PlayStation 5"],
            "maker" => "Insomniac Games"
        ],
        "battlefront" => [
            "titel" => "Star Wars Battlefront",
            "genres" => ["FPS", "Shooter", "Action", "Multiplayer"],
            "fotos" => ["images/battlefront_1.jpg", "images/battlefront_2.jpg", "images/battlefront_3.jpg"],
            "pegi" => 16,
            "beschrijving" => "Multiplayer shooter in het Star Wars-universum.",
            "rating" => 7.5,
            "trailer" => "https://www.youtube.com/embed/V2xp-qtUlsQ",
            "platforms" => ["PC", "PlayStation 4", "Xbox One"],
            "maker" => "DICE (Electronic Arts)"
        ]
    ];

    $gekozenGame = "battlefront";
    $leeftijd = 16;

    switch ($gekozenGame) {
        case "spiderman2":
            $game = $games["spiderman2"];
            break;
        case "battlefront":
            $game = $games["battlefront"];
            break;
        default:
            echo "Deze game bestaat niet.";
            
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
    echo "<strong>metascore:</strong> 85 / 100<br>";
    echo "<strong>review</strong>";
    echo "<p>It's not the most complex shooter, but it's the ideal pick-up-and-play experience for Star Wars fans. Stunning environments, solid shooting and immersive sound design mask the shortcomings. </p>";
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
<html