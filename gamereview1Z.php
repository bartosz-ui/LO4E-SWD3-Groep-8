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
    "mario" => [
        "titel" => "Super Mario Odyssey",
        "genres" => ["Platform", "Adventure", "Family"],
        "fotos" => [
            "mario1.jpg",
            "mario2.jpg",
            "mario3.jpg"
        ],
        "pegi" => 7,
        "beschrijving" => "Super Mario Odyssey is een vrolijk platformavontuur waarin Mario de wereld rondreist met zijn trouwe Cappy. Verken diverse koninkrijken, verzamel moons en beleef epische avonturen vol humor en actie.",
        "rating" => 9.8,
        "trailer" => "https://www.youtube.com/embed/wGQHQc_3ycE",
        "platforms" => ["Nintendo Switch"],
        "maker" => "Nintendo",
        "reviews" => [
            ["naam" => "Anna", "rating" => 5, "review" => "Fantastisch spel voor het hele gezin!"],
            ["naam" => "Piet", "rating" => 5, "review" => "Creatieve levels en leuke personages."],
            ["naam" => "Sophie", "rating" => 4, "review" => "Veel plezier, maar soms uitdagend."]
        ]
    ],

    "stardew_valley" => [
        "titel" => "Stardew Valley",
        "genres" => ["Simulation", "RPG", "Farming"],
        "fotos" => [
            "stardew1.jpg",
            "stardew2.jpg",
            "stardew3.jpg"
        ],
        "pegi" => 7,
        "beschrijving" => "Stardew Valley is een ontspannend farmsim spel waarin je een boerderij beheert, relaties opbouwt met dorpelingen en avonturen beleeft in mijnen vol monsters.",
        "rating" => 9.2,
        "trailer" => "https://www.youtube.com/embed/ot7uXNQskhs",
        "platforms" => ["PC", "PlayStation", "Xbox", "Nintendo Switch", "Mobile"],
        "maker" => "ConcernedApe",
        "reviews" => [
            ["naam" => "Mark", "rating" => 5, "review" => "Ontspannend en verslavend!"],
            ["naam" => "Lisa", "rating" => 5, "review" => "Perfecte mix van farming en avontuur."],
            ["naam" => "Tom", "rating" => 4, "review" => "Leuk voor lange speelsessies."]
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
        <option value="mario" <?php if ($gekozenGame == "mario") echo "selected"; ?>>
            Super Mario Odyssey
        </option>
        <option value="stardew_valley" <?php if ($gekozenGame == "stardew_valley") echo "selected"; ?>>
            Stardew Valley
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