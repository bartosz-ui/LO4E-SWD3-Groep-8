<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bartosz Zielinski">
    <!-- font link code -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Boldonse&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylesheet/index.css">
    <title>Gamestar - PEGI 16 Reviews (PHP)</title>
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

    <h2>PEGI 16 Game Reviews (PHP)</h2>

    <?php
    $games = [
        "arkse" => [
            "titel" => "Ark: Survival Evolved",
            "genres" => ["Survival", "Action", "Adventure", "Open World"],
            "fotos" => ["images/ark.jpg"],
            "pegi" => 16,
            "beschrijving" => "Overleef op een mysterieus eiland vol dinosaurussen en bouw je eigen basis.",
            "rating" => 8.5,
            "trailer" => "https://www.youtube.com/embed/example",
            "platforms" => ["PC", "PlayStation", "Xbox", "Nintendo Switch"],
            "maker" => "Studio Wildcard",
            "reviews" => [
                ["naam" => "Jan", "rating" => 5, "review" => "Uitdagend en verslavend! Veel te ontdekken."],
                ["naam" => "Lisa", "rating" => 4, "review" => "Leuke multiplayer, maar soms buggy."],
                ["naam" => "Tom", "rating" => 5, "review" => "Fantastisch overlevingsspel."]
            ]
        ],
        "darksouls" => [
            "titel" => "Dark Souls",
            "genres" => ["Action RPG", "Souls-like", "Challenging"],
            "fotos" => ["images/darksouls.jpg"],
            "pegi" => 16,
            "beschrijving" => "Een uitdagende actie-RPG vol boss fights en mysteries in een donkere wereld.",
            "rating" => 9.0,
            "trailer" => "https://www.youtube.com/embed/example",
            "platforms" => ["PC", "PlayStation", "Xbox"],
            "maker" => "FromSoftware",
            "reviews" => [
                ["naam" => "Sophie", "rating" => 5, "review" => "Meesterwerk! Uitdagend maar bevredigend."],
                ["naam" => "Mark", "rating" => 4, "review" => "Moeilijk, maar geweldig verhaal."],
                ["naam" => "Emma", "rating" => 5, "review" => "Klassieker voor gamers."]
            ]
        ]
    ];

    $gekozenGame = isset($_POST['game']) ? $_POST['game'] : "arkse";
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
            <option value="arkse" <?php if ($gekozenGame == "arkse") echo "selected"; ?>>Ark: Survival Evolved</option>
            <option value="darksouls" <?php if ($gekozenGame == "darksouls") echo "selected"; ?>>Dark Souls</option>
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