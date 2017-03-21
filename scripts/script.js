/*function check(input) {
	  if (input.value != document.getElementById('email_addr').value) {
		input.setCustomValidity('Les deux adresses e-mail ne correspondent pas.');
	  } else {
		// le champ est valide : on réinitialise le message d'erreur
		input.setCustomValidity('');
	  }
	}
*/

function checkMail(input) {
    if (input.value != document.getElementById('emailAddr').value) {
        input.setCustomValidity('Les deux adresses e-mail ne correspondent pas.');
    } else {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
}


function checkPhone(input) {
    if (input.value != "0[0-9]{9}") {
        input.setCustomValidity('Le format du numéro est incorrect');
    } else {
        // le champ est valide : on réinitialise le message d'erreur
        input.setCustomValidity('');
    }
}




function checkPassword(input) {
	  if (input.value != document.getElementById('password').value) {
		input.setCustomValidity('Les deux mdp ne correspondent pas.');
	  } else {
		// le champ est valide : on réinitialise le message d'erreur
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