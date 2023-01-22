const form = document.querySelector("form");
const titleInput = form.querySelector('input[name="title"]');
const breweryInput = form.querySelector('input[name="brewery"]');
const styleInput = form.querySelector('input[name="style"]');
const abvInput = form.querySelector('input[name="abv"]');
const descriptionInput = form.querySelector('textarea[name="description"]');

function tooShort(element) {
    return element.length > 2;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function checkStyle(element) {
    return element === 'lager' || element === 'pils' || element === 'porter' || element === 'stout' || element === 'ipa' ||
        element === 'Lager' || element === 'Pils' || element === 'Porter' || element === 'Stout' || element === 'Ipa' ||
        element === 'LAGER' || element === 'PILS' || element === 'PORTER' || element === 'STOUT' || element === 'IPA';

}

function onlyNumbers(element) {
    return /\d+%$/.test(element);
}

function validateTitle() {
    setTimeout(function () {
            markValidation(titleInput, tooShort(titleInput.value));
        },
        1000
    );
}

function validateBreweryName() {
    setTimeout(function () {
            markValidation(breweryInput, tooShort(breweryInput.value));
        },
        1000
    );
}

function validateStyle() {
    setTimeout(function () {
            markValidation(styleInput, checkStyle(styleInput.value));
        },
        1000
    );
}

function validateAbv() {
    setTimeout(function () {
            markValidation(abvInput, onlyNumbers(abvInput.value));
        },
        1000
    );
}

function validateDescription() {
    setTimeout(function () {
            markValidation(descriptionInput, tooShort(descriptionInput.value));
        },
        1000
    );
}

titleInput.addEventListener('keyup', validateTitle);
breweryInput.addEventListener('keyup', validateBreweryName);
styleInput.addEventListener('keyup', validateStyle);
abvInput.addEventListener('keyup', validateAbv);
descriptionInput.addEventListener('keyup', validateDescription);