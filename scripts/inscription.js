
function checkMail(input) {
    if (input.value != document.getElementById('emailAddr').value) {
        input.setCustomValidity('Les deux adresses e-mail ne correspondent pas.');
    } else {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
}


function checkPhone(input) {

    /*if (input.value != "0[0-9]{9}") {
        input.setCustomValidity('Le format du numéro est incorrect');
    } else {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }*/


    var reg = new RegExp("^0[1-9]([-. ]?[0-9]{2}){4}$");

    if(reg.test(input.value))
    {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
    else
    {
        input.setCustomValidity('Le format du numéro est incorrect');
    }
}


function checkPassword(input) {
    /*alert("premier mdp : " + input.value + "  -  " + input.innerText + " \n   " + document.getElementById('password').value + "   -  " + document.getElementById('password').innerText);
    if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('Les deux mdp ne correspondent pas.');
    } else {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }*/

    var mdp = document.getElementById("password_main").value; //la virgule répercute le var sur la deuxième déclaration
    var mdp2 = document.getElementById("password_repeat").value; //donc pas besoin de var ici
    if (mdp != mdp2)
    {
        //alert("je compare : " + mdp + " avec " + mdp2);
        input.setCustomValidity('Les deux mdp ne correspondent pas.');
    }
    else
    {
        input.setCustomValidity('');
    }

}


function checkPostDate(input){
    if(document.getElementById('arrival_dt').valueAsNumber < input.valueAsNumber ){
        input.setCustomValidity('');
    }
    else{
        input.setCustomValidity('La date de départ n est pas postérieure a la date d arrivee');
    }
}