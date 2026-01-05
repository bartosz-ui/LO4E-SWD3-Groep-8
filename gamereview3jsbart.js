
let games = {
    spiderman2: {
        titel: "Marvel's Spider-Man 2",
        genres: ["Action", "Adventure", "Open World"],
        fotos: ["images/spiderman2_1.jpg", "images/spiderman2_2.jpg", "images/spiderman2_3.jpg"],
        pegi: 16,
        beschrijving: "Peter Parker en Miles Morales beschermen New York tegen nieuwe vijanden.",
        rating: 9.0,
        trailer: "https://www.youtube.com/embed/9fVYKsEmuRo",
        platforms: ["PlayStation 5"]
    },
    battlefront: {
        titel: "Star Wars Battlefront",
        genres: ["FPS", "Shooter", "Action", "Multiplayer"],
        fotos: ["images/battlefront_1.jpg", "images/battlefront_2.jpg", "images/battlefront_3.jpg"],
        pegi: 16,
        beschrijving: "Multiplayer shooter in het Star Wars-universum.",
        rating: 7.5,
        trailer: "https://www.youtube.com/embed/V2xp-qtUlsQ",
        platforms: ["PC", "PlayStation 4", "Xbox One"]
    }
};

function loadGame(gameKey) {
    let game = games[gameKey];
    let slideshow = document.getElementById("slideshow");
    slideshow.innerHTML = "";
    game.fotos.forEach(f => slideshow.innerHTML += "<article><img src='" + f + "'></article>");

    let ratingBox = document.getElementById("ratingBox");
    ratingBox.innerHTML = "<strong>Rating:</strong> " + game.rating + " / 10<br>" +
                          "<strong>Metascore:</strong> 85 / 100<br>" +
                          "<strong>Review:</strong><p>It's not the most complex shooter, but it's fun!</p>";

    let info = document.getElementById("gameInfo");
    info.innerHTML = "<h1>" + game.titel + "</h1>";
    info.innerHTML += "<strong>Genres:</strong><br>" + game.genres.map(g => "- " + g).join("<br>") + "<br>";
    info.innerHTML += "<strong>Platforms:</strong><br>" + game.platforms.map(p => "- " + p).join("<br>") + "<br>";
    info.innerHTML += "<strong>Beschrijving:</strong><br>" + game.beschrijving + "<br>";
    info.innerHTML += "<strong>Trailer:</strong><br><iframe width='400' height='225' src='" + game.trailer + "'></iframe>";

    let articles = document.querySelectorAll("#slideshow article");
    let index = 0;
    function showPic(i) {
        articles.forEach(a => a.classList.remove("active"));
        if(articles[i]) articles[i].classList.add("active");
    }
    showPic(index);
    setInterval(() => {
        index = (index + 1) % articles.length;
        showPic(index);
    }, 3000);
}


loadGame("spiderman2");


document.getElementById("gameSelect").addEventListener("change", function() {
    loadGame(this.value);
});