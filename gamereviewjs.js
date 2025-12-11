const games = {
    spiderman2: {
        titel: "Marvel's Spider-Man 2",
        fotos: ["images/spiderman2_1.jpg", "images/spiderman2_2.jpg", "images/spiderman2_3.jpg"],
        pegi: 16,
        rating: 9.0,
        beschrijving: "Peter Parker en Miles Morales beschermen New York.",
        trailer: "https://www.youtube.com/embed/9fVYKsEmuRo"
    },

    battlefront: {
        titel: "Star Wars Battlefront",
        fotos: ["images/battlefront_1.jpg", "images/battlefront_2.jpg", "images/battlefront_3.jpg"],
        pegi: 16,
        rating: 7.5,
        beschrijving: "Multiplayer shooter in het Star Wars-universum.",
        trailer: "https://www.youtube.com/embed/V2xp-qtUlsQ"
    }
};

const select = document.getElementById("gameSelect");
const box = document.getElementById("gameBox");
const ageInput = document.getElementById("age");

select.addEventListener("change", function () {
    const keuze = select.value;
    const leeftijd = parseInt(ageInput.value);

    if (keuze === "") {
        box.innerHTML = "";
        return;
    }

    const game = games[keuze];

    if (leeftijd < game.pegi) {
        box.innerHTML = `
            <h2>Te jong voor deze game!</h2>
            <p>PEGI ${game.pegi} vereist.</p>
        `;
        return;
    }

    let html = `
        <h2>${game.titel}</h2>

        <div id="slideshow">
    `;

    for (let i = 0; i < game.fotos.length; i++) {
        html += `<img class="slide" src="${game.fotos[i]}">`;
    }

    html += `
        </div>

        <p><strong>Rating:</strong> ${game.rating} / 10</p>
        <p>${game.beschrijving}</p>

        <iframe width="400" height="225" src="${game.trailer}"></iframe>
    `;

    box.innerHTML = html;

    startSlideshow();
});

function startSlideshow() {
    let slides = document.querySelectorAll(".slide");
    let index = 0;

    slides.forEach(s => s.style.display = "none");

    slides[0].style.display = "block";

    setInterval(() => {
        slides[index].style.display = "none";
        index++;

        if (index >= slides.length) {
            index = 0;
        }

        slides[index].style.display = "block";
    }, 3000);
}
