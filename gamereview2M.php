<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Beau">
    <!-- font link code -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Boldonse&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet/index.css">
    <title>Gamestar - PEGI 16 Reviews (PHP 2)</title>
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

    <h2>PEGI 16 Game Reviews (PHP 2)</h2>

    <?php
    $games = [
        "marvelavengers" => [
            "titel" => "Marvel's Avengers",
            "genres" => ["Action", "RPG", "Superhero"],
            "fotos" => ["images/placeholder.jpg"],
            "pegi" => 16,
            "beschrijving" => "Speel als Avengers in een actie-RPG vol superhelden avonturen.",
            "rating" => 7.5,
            "trailer" => "https://www.youtube.com/embed/example",
            "platforms" => ["PC", "PlayStation", "Xbox"],
            "maker" => "Crystal Dynamics",
            "reviews" => [
                ["naam" => "HeroFan", "rating" => 4, "review" => "Leuke verhaal, maar korte campagne."],
                ["naam" => "AvengerSara", "rating" => 5, "review" => "Geweldig co-op en personages."],
                ["naam" => "ComicMike", "rating" => 4, "review" => "Mooie graphics, maar microtransacties."]
            ]
        ],
        "jurassicworldevo3" => [
            "titel" => "Jurassic World Evolution 3",
            "genres" => ["Simulation", "Management", "Strategy"],
            "fotos" => ["images/placeholder.jpg"],
            "pegi" => 16,
            "beschrijving" => "Beheer een Jurassic World park met dinosaurussen en bouw attracties.",
            "rating" => 8.5,
            "trailer" => "https://www.youtube.com/embed/example",
            "platforms" => ["PC", "PlayStation", "Xbox"],
            "maker" => "Frontier Developments",
            "reviews" => [
                ["naam" => "DinoLover", "rating" => 5, "review" => "Fantastisch! Meer diepte dan vorige delen."],
                ["naam" => "ParkManager", "rating" => 4, "review" => "Uitdagend beheer, maar soms buggy."],
                ["naam" => "TrexTom", "rating" => 5, "review" => "Roar-some game!"]
            ]
        ]
    ];

    $gekozenGame = isset($_POST['game']) ? $_POST['game'] : "marvelavengers";
    $leeftijd = isset($_POST['leeftijd']) ? (int)$_POST['leeftijd'] : 16;

    if (!array_key_exists($gekozenGame, $games)) {
        echo "<p>Deze game bestaat niet.</p>";
        exit;
    }

    $game = $games[$gekozenGame];

    if ($leeftijd < $game["pegi"]) {
        echo "<h2>Niet toegestaan</h2>";
        echo "<p>PEGI: {$game['pegi']}</p>";
        echo "<p>Jouw leeftijd: {$leeftijd}</p>";
        echo "<p>Je bent niet oud genoeg om deze game te bekijken.</p>";
        exit;
    }
    ?>

    <form method="post" action="">
        <label for="leeftijd">Wat is je leeftijd?</label>
        <input type="number" id="leeftijd" name="leeftijd" value="<?php echo $leeftijd; ?>" required>
        <br>
        <label for="game">Kies een game:</label>
        <select id="game" name="game">
            <option value="marvelavengers" <?php if ($gekozenGame == "marvelavengers") echo "selected"; ?>>Marvel's Avengers</option>
            <option value="jurassicworldevo3" <?php if ($gekozenGame == "jurassicworldevo3") echo "selected"; ?>>Jurassic World Evolution 3</option>
        </select>
        <br>
        <input type="submit" value="Laad Review">
    </form>

    <section class="game-container">
        <section class="left-column">
            <section id="slideshow">
                <?php
                foreach ($game["fotos"] as $foto) {
                    echo "<article><img src='{$foto}' alt='{$game['titel']}'></article>";
                }
                ?>
            </section>
            <section id="userReviews">
                <h3>Gebruikersreviews:</h3>
                <?php
                foreach ($game["reviews"] as $rev) {
                    echo "<div class='review'>";
                    echo "<strong>{$rev['naam']}</strong> - Rating: {$rev['rating']}/5<br>";
                    echo "{$rev['review']}";
                    echo "</div><hr>";
                }
                ?>
            </section>
        </section>
        <section id="gameInfo" class="game-info">
            <h1><?php echo $game['titel']; ?></h1>
            <strong>PEGI:</strong> <?php echo $game['pegi']; ?><br>
            <strong>Genres:</strong><br>
            <?php
            foreach ($game["genres"] as $genre) {
                echo "- {$genre}<br>";
            }
            ?>
            <br><strong>Platforms:</strong><br>
            <?php
            foreach ($game["platforms"] as $platform) {
                echo "- {$platform}<br>";
            }
            ?>
            <br><strong>Beschrijving:</strong><br><?php echo $game['beschrijving']; ?><br>
            <strong>Maker:</strong> <?php echo $game['maker']; ?><br>
            <br><strong>Trailer:</strong><br><iframe width='400' height='225' src='<?php echo $game['trailer']; ?>'></iframe>
        </section>
    </section>

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