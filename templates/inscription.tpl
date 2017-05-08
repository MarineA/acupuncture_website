<h1>Inscription </h1>

<div class="inscription">
<form method="post" action="inscription" id="formulaire_inscription">

    <ul>
        <li>
            <label for="name">Nom&nbsp;:</label>
            <input type="text" id="name" name="name" tabindex="0" placeholder="Dupont" required oninput="checkFNames(this);">
        </li>

        <li>
            <label for="firstname">Prénom&nbsp;:</label>
            <input type="text" id="firstname" name="firstname" tabindex="0" placeholder="Camille" required
                   oninput="checkFNames(this)">
        </li>

        <li>
            <label for="birthdate">Date de naissance (jj/mm/aaaa):</label>
            <input type="date" id="birthdate" name="birthdate" tabindex="0" max="" min="" data-placeholder="jj/mm/aaaa" required
                onblur="dateNow(this)" onclick="dateNow(this)" >  {*onblur (quand on quitte le champ) pour la saisie manuelle, onclick pour le calendrier*}
        </li>

        <li>
            <label for="emailAddr">Adresse e-mail&nbsp;:</label>
            <input type="email" id="emailAddr"  name="emailAddr" tabindex="0" placeholder="dupontcamille@a.fr" required>
        </li>

        <li>
            <label for="emailAddrRepeat">Confirmez l'adresse e-mail&nbsp;:</label>
            <input type="email" id="emailAddrRepeat" name="emailAddrRepeat" tabindex="0" placeholder="dupontcamille@a.fr" required
            oninput="checkMail(this)">
        </li>

        <li>
            <label for="phone">Numéro de téléphone&nbsp;:</label>
            <input type="text" id="phone" name="phone" tabindex="0" placeholder="0123456789" required
                   oninput="checkPhone(this)">
        </li>

        <li>
            <label for="login">Login&nbsp;:</label>
            <input type="text" id="login" name="login" tabindex="0" required oninput="checkLogin(this)">
        </li>

        <li>
            <label for="password_main">Mot de passe&nbsp;:</label>
            <input type="password" id="password_main" name="password_main"  tabindex="0" required oninput="checkPassword(this)">
        </li>

        <li>
            <label for="password_repeat">Confirmez votre mot de passe&nbsp;:</label>
            <input type="password" id="password_repeat" name="password_repeat" tabindex="0" required oninput="checkPasswordRepeat(this)">
        </li>

        <li>
            <input type="submit" tabindex="0" value="Valider le formulaire" id="validationBouton"/>
        </li>
    </ul>
</form>
</div>
