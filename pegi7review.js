let games = {
    plantvszombies: {
        titel: "Plants vs. Zombies",
        genres: ["Tower Defense", "Strategy", "Puzzle"],
        fotos: ["images/placeholder.jpg"],
        pegi: 7,
        beschrijving: "Verdedig je huis tegen zombies met behulp van planten in deze leuke tower defense game.",
        rating: 8.5,
        trailer: "https://www.youtube.com/embed/example",
        platforms: ["PC", "PlayStation", "Xbox", "Nintendo DS"],
        maker: "PopCap Games",
        reviews: [
            { naam: "Kees", rating: 5, review: "Klassieker! Leuk voor alle leeftijden." },
            { naam: "Marie", rating: 4, review: "Mooie graphics en strategie." },
            { naam: "Henk", rating: 5, review: "Verslavend en grappig." }
        ]
    },
    skylandersgiants: {
        titel: "Skylanders Giants",
        genres: ["Action", "Adventure", "Platformer"],
        fotos: ["images/placeholder.jpg"],
        pegi: 7,
        beschrijving: "Speel als gigantische Skylanders in een avontuur vol actie en magie.",
        rating: 8.0,
        trailer: "https://www.youtube.com/embed/example",
        platforms: ["PlayStation", "Xbox", "Wii", "Nintendo 3DS"],
        maker: "Toys for Bob",
        reviews: [
            { naam: "Bas", rating: 4, review: "Leuk voor kinderen, veel actie." },
            { naam: "Linda", rating: 5, review: "Fantastisch verhaal en personages." },
            { naam: "Erik", rating: 4, review: "Goede multiplayer opties." }
        ]
    }
};

let leeftijd = Number(prompt("Wat is je leeftijd?"));

function loadGame(gameKey) {
    let game = games[gameKey];

   
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

    
    let slideshow = document.getElementById("slideshow");
    slideshow.innerHTML = "";
    for (let i = 0; i < game.fotos.length; i++) {
        slideshow.innerHTML += "<article><img src='" + game.fotos[i] + "' alt='" + game.titel + "'></article>";
    }

   
    let userReviews = document.getElementById("userReviews");
    userReviews.innerHTML = "<h3>Gebruikersreviews:</h3>";
    for (let i = 0; i < game.reviews.length; i++) {
        userReviews.innerHTML += "<div class='review'><strong>" + game.reviews[i].naam + "</strong> - Rating: " + game.reviews[i].rating + "/5<br>" + game.reviews[i].review + "</div><hr>";
    }

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


document.getElementById("gameSelect").addEventListener("change", function() {
    loadGame(this.value);
});

loadGame("plantvszombies");