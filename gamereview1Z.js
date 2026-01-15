let games = {
    scum: {
        titel: "SCUM",
        genres: ["Survival", "Open World", "Multiplayer"],
        fotos: [
            "images/scum1.jpg",
            "images/scum2.jpg",
            "images/scum3.jpg"
        ],
        pegi: 18,
        beschrijving: "SCUM is een hardcore survivalgame waarin spelers moeten overleven op een eiland vol gevaren, andere spelers en realistische gameplaymechanieken.",
        rating: 8.2,
        trailer: "https://www.youtube.com/embed/eYy3a2h3m4Y",
        platforms: ["PC"],
        maker: "Gamepires",
        reviews: [
            { naam: "Alex", rating: 4, review: "Zeer realistisch en uitdagend, niets voor casual spelers." },
            { naam: "Brian", rating: 5, review: "Diepgaande survival mechanics, geweldig!" },
            { naam: "Chris", rating: 3, review: "Leuk idee, maar nog wat bugs." }
        ]
    },

    need_for_speed_2: {
        titel: "Need for Speed II",
        genres: ["Racing", "Arcade"],
        fotos: [
            "images/nfs2_1.jpg",
            "images/nfs2_2.jpg",
            "images/nfs2_3.jpg"
        ],
        pegi: 3,
        beschrijving: "Need for Speed II is een klassieke arcade racegame met exotische auto's en circuits over de hele wereld.",
        rating: 7.8,
        trailer: "https://www.youtube.com/embed/0Y2y4Kc7xJw",
        platforms: ["PC", "PlayStation"],
        maker: "Electronic Arts",
        reviews: [
            { naam: "Dennis", rating: 4, review: "Pure nostalgie, geweldige soundtrack." },
            { naam: "Eva", rating: 3, review: "Besturing is wat verouderd, maar nog steeds leuk." },
            { naam: "Mark", rating: 4, review: "Klassieker die nooit verveelt." }
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

loadGame("mario");