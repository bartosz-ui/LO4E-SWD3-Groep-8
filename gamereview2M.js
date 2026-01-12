let games = {
    goldeneye: {
        titel: "James Bond GoldenEye 007",
        genres: ["FPS", "Action", "Spy"],
        fotos: ["images/placeholder.jpg"],
        pegi: 16,
        beschrijving: "Een klassieke FPS met James Bond in een spionage avontuur vol actie.",
        rating: 9.0,
        trailer: "https://www.youtube.com/embed/example",
        platforms: ["Nintendo 64", "PC", "Xbox"],
        maker: "Rare / n-Space",
        reviews: [
            { naam: "BondFan", rating: 5, review: "Tijdloze klassieker! Geweldig voor retro gamers." },
            { naam: "SpyKid", rating: 4, review: "Leuke multiplayer, maar graphics zijn verouderd." },
            { naam: "Agent007", rating: 5, review: "Shaken, not stirred!" }
        ]
    },
    readyornot: {
        titel: "Ready or Not",
        genres: ["Tactical", "Simulation", "Co-op"],
        fotos: ["images/placeholder.jpg"],
        pegi: 16,
        beschrijving: "Een realistische SWAT simulator voor co-op missies tegen criminelen.",
        rating: 8.0,
        trailer: "https://www.youtube.com/embed/example",
        platforms: ["PC"],
        maker: "VOID Interactive",
        reviews: [
            { naam: "TacticalTom", rating: 4, review: "Uitdagend en realistisch! Goede co-op." },
            { naam: "SWATSara", rating: 5, review: "Verslavend, maar intens." },
            { naam: "CopMike", rating: 4, review: "Leuke mechanics, maar soms frustrerend." }
        ]
    }
};

// Vraag leeftijd
let leeftijd = Number(prompt("Wat is je leeftijd?"));

function loadGame(gameKey) {
    let game = games[gameKey];

    // PEGI check
    if (leeftijd < game.pegi) {
        document.getElementById("gameInfo").innerHTML = 
            "<h2>Niet toegestaan</h2>" +
            "<p>PEGI: " + game.pegi + "</p>" +
            "<p>Jouw leeftijd: " + leeftijd + "</p>" +
            "<p>Je bent niet oud genoeg om deze game te bekijken.</p>";
        document.getElementById("slideshow").innerHTML = "";
        document.getElementById("ratingBox").innerHTML = "";
        document.getElementById("userReviews").innerHTML = "";
        return;
    }

    // Slideshow
    let slideshow = document.getElementById("slideshow");
    slideshow.innerHTML = "";
    for (let i = 0; i < game.fotos.length; i++) {
        slideshow.innerHTML += "<article><img src='" + game.fotos[i] + "' alt='" + game.titel + "'></article>";
    }

    // User reviews
    let userReviews = document.getElementById("userReviews");
    userReviews.innerHTML = "<h3>Gebruikersreviews:</h3>";
    for (let i = 0; i < game.reviews.length; i++) {
        userReviews.innerHTML += "<div class='review'><strong>" + game.reviews[i].naam + "</strong> - Rating: " + game.reviews[i].rating + "/5<br>" + game.reviews[i].review + "</div><hr>";
    }

    // Game info
    let info = document.getElementById("gameInfo");
    info.innerHTML = "<h1>" + game.titel + "</h1>";
    info.innerHTML += "<strong>PEGI:</strong> " + game.pegi + "<br>";
    info.innerHTML += "<strong>Genres:</strong><br>";
    for (let i = 0; i < game.genres.length; i++) {
        info.innerHTML += "- " + game.genres[i] + "<br>";
    }
    info.innerHTML += "<br><strong>Platforms:</strong><br>";
    for (let i = 0; i < game.platforms.length; i++) {
        info.innerHTML += "- " + game.platforms[i] + "<br>";
    }
    info.innerHTML += "<br><strong>Beschrijving:</strong><br>" + game.beschrijving + "<br>";
    info.innerHTML += "<strong>Maker:</strong> " + game.maker + "<br>";
    info.innerHTML += "<br><strong>Trailer:</strong><br><iframe width='400' height='225' src='" + game.trailer + "'></iframe>";

    // Slideshow logica
    let articles = document.querySelectorAll("#slideshow article");
    let index = 0;
    function showArticle(i) {
        for (let j = 0; j < articles.length; j++) {
            articles[j].classList.remove("active");
        }
        articles[i].classList.add("active");
    }
    if (articles.length > 0) {
        showArticle(index);
        setInterval(function () {
            index = (index + 1) % articles.length;
            showArticle(index);
        }, 3000);
    }
}

// Event listener voor dropdown
document.getElementById("gameSelect").addEventListener("change", function() {
    loadGame(this.value);
});

// Laad eerste game standaard
loadGame("goldeneye");