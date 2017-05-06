/* Formulaire de connexion */

function checkMail(input) {
    if (input.value === "") {
        input.setCustomValidity('Le champs est vide');
    } else {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
}

function checkPassword(input) {
    if (input.value === "") {
        input.setCustomValidity('Le champs est vide');
    } else {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
}