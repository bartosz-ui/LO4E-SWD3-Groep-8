let games = {
    spiderman2: {
        titel: "Marvel's Spider-Man 2",
        genres: ["Action", "Adventure", "Open World"],
        fotos: ["images/spiderman2_1.jpg","images/spiderman2_2.jpg","images/spiderman2_3.jpg"],
        pegi: 16,
        beschrijving: "Peter Parker en Miles Morales beschermen New York tegen nieuwe vijanden.",
        rating: 9.0,
        trailer: "https://www.youtube.com/embed/9fVYKsEmuRo",
        platforms: ["PlayStation 5"],
        maker: "Insomniac Games",
        reviews: [
            { naam: "Jan", rating: 5, review: "Geweldige game! De graphics en gameplay zijn top." },
            { naam: "Lisa", rating: 4, review: "Leuke game, maar soms te makkelijk." },
            { naam: "Tom", rating: 3, review: "Mooie open wereld, maar het verhaal stelt teleur." }
        ]
    },
    battlefront: {
        titel: "Star Wars Battlefront",
        genres: ["FPS", "Shooter", "Action", "Multiplayer"],
        fotos: ["images/battlefront_1.jpg","images/battlefront_2.jpg","images/battlefront_3.jpg"],
        pegi: 16,
        beschrijving: "Multiplayer shooter in het Star Wars-universum.",
        rating: 7.5,
        trailer: "https://www.youtube.com/embed/V2xp-qtUlsQ",
        platforms: ["PC","PlayStation 4","Xbox One"],
        maker: "DICE (Electronic Arts)",
        reviews: [
            { naam: "Sophie", rating: 4, review: "Leuke multiplayer, maar snel repetitief." },
            { naam: "Mark", rating: 3, review: "Mooie graphics maar weinig nieuwe content." },
            { naam: "Emma", rating: 5, review: "Ik ben groot Star Wars fan, deze game is fantastisch!" }
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

    // Slideshow
    let slideshow = document.getElementById("slideshow");
    slideshow.innerHTML = "";
    for (let i=0; i<game.fotos.length; i++){
        slideshow.innerHTML += "<article><img src='" + game.fotos[i] + "' alt='" + game.titel + "'></article>";
    }

    
    
    let userReviews = document.getElementById("userReviews");
    userReviews.innerHTML = "<h3>Gebruikersreviews:</h3>";
    for (let i=0; i<game.reviews.length; i++){
        userReviews.innerHTML += "<div class='review'><strong>" + game.reviews[i].naam + "</strong> - Rating: " + game.reviews[i].rating + "/5<br>" + game.reviews[i].review + "</div><hr>";
    }

    // Game info
    let info = document.getElementById("gameInfo");
    info.innerHTML = "<h1>" + game.titel + "</h1>";
    info.innerHTML += "<strong>PEGI:</strong> " + game.pegi + "<br>";
    info.innerHTML += "<strong>Genres:</strong><br>";
    for (let i=0; i<game.genres.length; i++){
        info.innerHTML += "- " + game.genres[i] + "<br>";
    }
    info.innerHTML += "<br><strong>Platforms:</strong><br>";
    for (let i=0; i<game.platforms.length; i++){
        info.innerHTML += "- " + game.platforms[i] + "<br>";
    }
    info.innerHTML += "<br><strong>Beschrijving:</strong><br>" + game.beschrijving + "<br>";
    info.innerHTML += "<strong>Maker:</strong> " + game.maker + "<br>";
    info.innerHTML += "<br><strong>Trailer:</strong><br><iframe width='400' height='225' src='" + game.trailer + "'></iframe>";

    // Slideshow logica
    let articles = document.querySelectorAll("#slideshow article");
    let index = 0;
    function showArticle(i){
        for(let j=0; j<articles.length; j++){
            articles[j].classList.remove("active");
        }
        articles[i].classList.add("active");
    }
    showArticle(index);
    setInterval(function(){
        index = (index+1) % articles.length;
        showArticle(index);
    }, 3000);
}

// Eerste game laden
loadGame("spiderman2");

// Select box event
document.getElementById("gameSelect").addEventListener("change", function(){
    loadGame(this.value);
});