const search = document.querySelector('input[placeholder="Discover beer here..."]');
const beerContainer = document.querySelector('.beers');

search.addEventListener('keyup', function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (beers) {
            beerContainer.innerHTML = "";
            loadBeers(beers)
        });
    }
});

function loadBeers(beers) {
    beers.forEach(beer => {
        console.log(beer);
        createBeer(beer);
    });
}

function createBeer(beer) {
    const template = document.querySelector("#beerSearch-template");

    const clone = template.content.cloneNode(true);
    const img = clone.querySelector("img");
    img.src = `/public/uploads/${beer.img}`;
    const title = clone.querySelector("b");
    title.innerHTML = beer.title;
    const input = clone.querySelector("input");
    input.value = beer.title;

    beerContainer.appendChild(clone);
}
