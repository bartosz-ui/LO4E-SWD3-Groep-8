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
            "maker" => "Insomniac Games",
            "reviews" => [
                ["naam" => "Jan", "rating" => 5, "review" => "Geweldige game! De graphics en gameplay zijn top."],
                ["naam" => "Lisa", "rating" => 4, "review" => "Leuke game, maar soms te makkelijk."],
                ["naam" => "Tom", "rating" => 3, "review" => "Mooie open wereld, maar het verhaal stelt teleur."]
            ]
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
            "maker" => "DICE (Electronic Arts)",
            "reviews" => [
                ["naam" => "Sophie", "rating" => 4, "review" => "Leuke multiplayer, maar snel repetitief."],
                ["naam" => "Mark", "rating" => 3, "review" => "Mooie graphics maar weinig nieuwe content."],
                ["naam" => "Emma", "rating" => 5, "review" => "Ik ben groot Star Wars fan, deze game is fantastisch!"]
            ]
        ]
    ];


    $gekozenGame = $_GET["game"] ?? "spiderman2";

    if (!isset($games[$gekozenGame])) {
        echo "Deze game bestaat niet.";
        exit;
    }

    $game = $games[$gekozenGame];
if (isset($_POST["submitReview"])) {
    $naam = $_POST["naam"];
    $beschrijving = $_POST["beschrijving"];
    $rating = (int)$_POST["rating"];

    // Nieuwe review toevoegen
    $game["reviews"][] = [
        "naam" => $naam,
        "rating" => $rating,
        "review" => $beschrijving
    ];

    // Rating herberekenen
    $totaal = 0;
    foreach ($game["reviews"] as $rev) {
        $totaal += $rev["rating"];
    }
    $game["rating"] = round($totaal / count($game["reviews"]), 1);
}

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
    echo '<section class="user-reviews">';
    echo "<h3>Gebruikersreviews:</h3>";

    foreach ($game["reviews"] as $rev) {
        echo "<div class='review'>";
        echo "<strong>{$rev['naam']}</strong> - Rating: {$rev['rating']}/5<br>";
        echo "<p>{$rev['review']}</p>";
        echo "</div><hr>";
    }
    ?>
 <h3>Schrijf een review</h3>

<form method="post">
    <label>Naam:</label><br>
    <input type="text" name="naam" required><br><br>

    <label>Beschrijving:</label><br>
    <textarea name="beschrijving" required></textarea><br><br>

    <label>Rating:</label><br>
    <input type="radio" name="rating" value="1" required> 1
    <input type="radio" name="rating" value="2"> 2
    <input type="radio" name="rating" value="3"> 3
    <input type="radio" name="rating" value="4"> 4
    <input type="radio" name="rating" value="5"> 5<br><br>

    <input type="submit" name="submitReview" value="Plaats review">
</form>
<?php
    echo '</section>';

    echo '</section>';
    echo '</section>';
    echo '<section class="game-info">';
    echo "<h1>{$game['titel']}</h1>";
    echo "<strong>pegi:</strong>" . $games['spiderman2']['pegi'] . "</p>";
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
    echo "<strong>Maker:</strong> {$game['maker']}<br><br>";
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