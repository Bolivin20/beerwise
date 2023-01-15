const searchBrewery = document.querySelector('input[placeholder="Discover brewery here..."]');
const breweryContainer = document.querySelector('.breweries');

searchBrewery.addEventListener('keyup', function (event) {
    //TODO action after every keyup
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {searchBrewery: this.value};

        fetch("/searchBrewery", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (breweries) {
            breweryContainer.innerHTML = "";
            loadBreweries(breweries)
        });
    }
});

function loadBreweries(breweries) {
    breweries.forEach(brewery => {
        console.log(brewery);
        createBrewery(brewery);
    });
}

function createBrewery(brewery) {
    const template = document.querySelector("#brewerySearch-template");

    const clone = template.content.cloneNode(true);
    const name = clone.querySelector("b");
    name.innerHTML = brewery.name;
    const input = clone.querySelector("input");
    input.value = brewery.name;

    breweryContainer.appendChild(clone);
}