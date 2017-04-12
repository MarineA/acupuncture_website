/* Formulaire d'inscription' */
function checkFNames(input) {
    var reg = new RegExp("^([a-zA-Z])+([- ]?[a-zA-Z])+$");

    if(reg.test(input.value))
    {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
    else
    {
        input.setCustomValidity('Le champ doit commencer et finir par des lettres');
    }
}


function dateNow(input) {
    var vDate = new Date();
    var mois = vDate.getUTCMonth()+1; // getUTCMonth commence à 0
    if (mois < 10){
        mois = '0' + mois; //sinon non reconnu dans le onclick
    }

    var day = vDate.getUTCDate();
    if (day < 10){
        day = '0' + day;
    }

    var maxDate= vDate.getUTCFullYear()+'-'+mois+'-'+day;
    var minDate = vDate.getUTCFullYear()-150+'-'+mois+'-'+day;

    //alert('vDate = '+vDate+'   vDateMax = '+maxDate+' minDate = '+minDate + '    mois = '+mois);
    input.setAttribute("max", maxDate);
    input.setAttribute("min", minDate);
}


function checkMail(input) {
    if (input.value != document.getElementById('emailAddr').value) {
        input.setCustomValidity('Les deux adresses e-mail doivent être identiques');
    } else {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
}


function checkPhone(input) {
    var reg = new RegExp("^0[1-9]([-. ]?[0-9]{2}){4}$");
    var message ='';
    if(reg.test(input.value))
    {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
    else
    {
        message = 'Le format du numéro est incorrect';
        if(input.value.charAt(0) != 0 ) {
            message = message+': il doit commencer par un 0';
        }
        else {
            message = message + ': doit contenir 10 chiffres';
        }
        input.setCustomValidity(message);
    }
}


function checkLogin(input) {
    var reg = new RegExp("^[a-zA-Z1-9]+$");

    if(reg.test(input.value))
    {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
    else
    {
        input.setCustomValidity('Le login doit contenir des chiffres et/ou des lettres');
    }
}


function checkPassword(input) {
    var reg = new RegExp("^[\\S.]{6,20}$");

    if(reg.test(input.value))
    {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
    else
    {
        input.setCustomValidity('Le mot de passe doit contenir entre 6 et 20 caractères sans espace');
    }
}


function checkPasswordRepeat(input) {
    var mdp = document.getElementById("password_main").value;
    var mdp2 = document.getElementById("password_repeat").value; //donc pas besoin de var ici
    if (mdp != mdp2)
    {
        //alert("je compare : " + mdp + " avec " + mdp2);
        input.setCustomValidity('Les deux mots de passe doivent être identiques');
    }
    else
    {
        input.setCustomValidity('');
    }
}


