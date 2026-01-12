let games = {
    halo: {
        titel: "Halo",
        genres: ["FPS", "Action", "Sci-Fi"],
        fotos: ["images/placeholder.jpg"],
        pegi: 16,
        beschrijving: "Een epische sci-fi shooter met Master Chief tegen aliens.",
        rating: 9.5,
        trailer: "https://www.youtube.com/embed/example",
        platforms: ["PC", "Xbox", "PlayStation"],
        maker: "Bungie / 343 Industries",
        reviews: [
            { naam: "Alex", rating: 5, review: "Klassieker! Geweldig verhaal en gameplay." },
            { naam: "Sara", rating: 4, review: "Leuke multiplayer, maar verhaal is oud." },
            { naam: "Mike", rating: 5, review: "Master Chief forever!" }
        ]
    },
    apexlegends: {
        titel: "Apex Legends",
        genres: ["Battle Royale", "FPS", "Multiplayer"],
        fotos: ["images/placeholder.jpg"],
        pegi: 16,
        beschrijving: "Een battle royale shooter met unieke legendes en snelle actie.",
        rating: 8.5,
        trailer: "https://www.youtube.com/embed/example",
        platforms: ["PC", "PlayStation", "Xbox", "Nintendo Switch"],
        maker: "Respawn Entertainment",
        reviews: [
            { naam: "Jordan", rating: 4, review: "Verslavend! Goede squad mechanics." },
            { naam: "Taylor", rating: 5, review: "Beter dan Fortnite, meer diepte." },
            { naam: "Casey", rating: 4, review: "Leuke characters, maar soms unbalanced." }
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

loadGame("halo");