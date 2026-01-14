let games = {
    mario: {
        titel: "Super Mario Odyssey",
        genres: ["Platformer", "Adventure", "Family"],
        fotos: ["images/placeholder.jpg"],
        pegi: 7,
        beschrijving: "Een avontuurlijke platformer met Mario die de wereld rondreist.",
        rating: 9.8,
        trailer: "https://www.youtube.com/embed/example",
        platforms: ["Nintendo Switch"],
        maker: "Nintendo",
        reviews: [
            { naam: "Anna", rating: 5, review: "Geweldig voor alle leeftijden! Leuk en creatief." },
            { naam: "Ben", rating: 5, review: "Mario is terug in topvorm." },
            { naam: "Cathy", rating: 4, review: "Mooie graphics en leuke levels." }
        ]
    },
    zelda: {
        titel: "The Legend of Zelda: Breath of the Wild",
        genres: ["Action-Adventure", "Open World", "RPG"],
        fotos: ["images/placeholder.jpg"],
        pegi: 7,
        beschrijving: "Een open wereld avontuur met Link in Hyrule.",
        rating: 9.5,
        trailer: "https://www.youtube.com/embed/example",
        platforms: ["Nintendo Switch", "Wii U"],
        maker: "Nintendo",
        reviews: [
            { naam: "David", rating: 5, review: "Vrijheid om te verkennen! Meesterwerk." },
            { naam: "Eva", rating: 5, review: "Uitdagend en mooi." },
            { naam: "Frank", rating: 4, review: "Leuke puzzels en actie." }
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