<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Beau">
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

    <h2>PEGI 7 Game Reviews (PHP)</h2>

    <?php
   $games = [
    "dark_souls_3" => [
        "titel" => "Dark Souls III",
        "genres" => ["Action RPG", "Soulslike", "Fantasy"],
        "fotos" => [
            "darksouls3_1.jpg",
            "darksouls3_2.jpg",
            "darksouls3_3.jpg"
        ],
        "pegi" => 16,
        "beschrijving" => "Dark Souls III is een uitdagende action RPG waarin spelers een duistere en vervallen wereld verkennen vol gevaarlijke vijanden en epische eindbazen. De game staat bekend om zijn diepe lore, strakke combat en hoge moeilijkheidsgraad.",
        "rating" => 9.5,
        "trailer" => "https://www.youtube.com/embed/cWBwFhUv1-8",
        "platforms" => ["PlayStation 4", "Xbox One", "PC"],
        "maker" => "FromSoftware",
        "reviews" => [
            ["naam" => "Mark", "rating" => 5, "review" => "Een meesterwerk voor liefhebbers van uitdaging en sfeer."],
            ["naam" => "Lisa", "rating" => 5, "review" => "Brutale moeilijkheid maar enorm bevredigend."],
            ["naam" => "Tom", "rating" => 4, "review" => "Fantastische wereld en combat, maar niets voor beginners."]
        ]
    ],

    "sekiro" => [
        "titel" => "Sekiro: Shadows Die Twice",
        "genres" => ["Action", "Adventure", "Soulslike"],
        "fotos" => [
            "sekiro1.jpg",
            "sekiro2.jpg",
            "sekiro3.jpg"
        ],
        "pegi" => 18,
        "beschrijving" => "Sekiro: Shadows Die Twice is een intense actiegame waarin je speelt als een shinobi in feodaal Japan. De focus ligt op snelle zwaardgevechten, timing en stealth, met een unieke combatstijl die draait om pareren.",
        "rating" => 9.6,
        "trailer" => "https://www.youtube.com/embed/rXMX4YJ7Lks",
        "platforms" => ["PlayStation 4", "Xbox One", "PC"],
        "maker" => "FromSoftware",
        "reviews" => [
            ["naam" => "Jeroen", "rating" => 5, "review" => "Fantastische combat en prachtige setting."],
            ["naam" => "Sanne", "rating" => 5, "review" => "Extreem moeilijk maar super bevredigend."],
            ["naam" => "Kevin", "rating" => 4, "review" => "Niet voor iedereen, maar wel briljant."]
        ]
    ]
];


    $gekozenGame = isset($_POST['game']) ? $_POST['game'] : "mario";
    $leeftijd = isset($_POST['leeftijd']) ? (int)$_POST['leeftijd'] : 7;

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
        <option value="dark_souls_3" <?php if ($gekozenGame == "dark_souls_3") echo "selected"; ?>>
            Dark Souls III
        </option>
        <option value="sekiro" <?php if ($gekozenGame == "sekiro") echo "selected"; ?>>
            Sekiro: Shadows Die Twice
        </option>
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