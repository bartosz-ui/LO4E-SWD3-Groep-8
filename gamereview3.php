<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Bartosz Zielinski">
    <!-- font link code -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Boldonse&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="stylesheet/index.css">
    <title>Gamestar</title>
</head>

<body>

    <header>
        <nav>
            <a href="index.html"><img src="images/logo.jpg" alt="logo" id="logoimg"></a>
            <h3 id="logoname">Gamestars</h3>
            <ul id="nav-links">
                <li><a id="headerurls" href="gamesmodule.html">games</a></li>
                <li><a id="headerurls" href="merchandise.html">merchandise</a></li>
                <li><a id="headerurls" href="contacts.html">contact</a></li>
                <li><a id="headerurls" href="reviews.html">reviews</a></li>
                <li><input type="text" id="searchBar" placeholder="Search..." /></li>
                <li><a href="register.html" id="register-button">Register</a></li>
            </ul>
        </nav>
    </header>
    <?php
    $game1 = [
        "titel" => "Marvel's Spider-Man 2",
        "genres" => ["Action", "Adventure", "Open World"],
        "fotos" => [
            "spiderman2_1.jpg",
            "spiderman2_2.jpg",
            "spiderman2_3.jpg"
        ],
        "pegi" => 16,
        "beschrijving" => "Marvel's Spider-Man 2 brengt Peter Parker en Miles Morales samen in een nieuw verhaal waarin ze New York beschermen tegen nieuwe en gevaarlijke vijanden zoals Venom en Kraven the Hunter.",
        "rating" => 9.0,
        "trailer" => "https://www.youtube.com/embed/bkBXqU3dP_0",
        "platforms" => ["PlayStation 5"],
        "maker" => "Insomniac Games"
    ];
    $game2 = [
        "titel" => "Star Wars Battlefront",
        "genres" => ["FPS", "Shooter", "Action", "Multiplayer"],
        "fotos" => [
            "battlefront_1.jpg",
            "battlefront_2.jpg",
            "battlefront_3.jpg"
        ],
        "pegi" => 16,
        "beschrijving" => "Star Wars Battlefront is een multiplayer shooter waarin je iconische locaties uit het Star Wars-universum verkent en strijdt als trooper, pilot of hero. Grote veldslagen, voertuigen en authentieke Star Wars-ervaring staan centraal.",
        "rating" => 7.5, 
        "trailer" => "https://www.youtube.com/embed/Vt1x7jJ-Jw4",
        "platforms" => ["PC", "PlayStation 4", "Xbox One"],
        "maker" => "DICE (Electronic Arts)"
    ];

    ?>





</body>