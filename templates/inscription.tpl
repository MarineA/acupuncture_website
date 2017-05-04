<div class="inscription">
<h1>Inscription </h1>

<form method="post" action="inscription" id="formulaire">

    <ul>
        <li>
            <label for="name">Nom&nbsp;:</label>
            <input type="text" id="name" alt="Entrez votre nom" name="name" tabindex="0" placeholder="Dupont" required oninput="checkFNames(this);">
        </li>

        <li>
            <label for="firstname">Prénom&nbsp;:</label>
            <input type="text" id="firstname" alt="Entrez votre prénom" name="firstname" tabindex="0" placeholder="Camille" required
                   oninput="checkFNames(this)">
        </li>

        <li>
            <label for="birthdate">Date de naissance&nbsp;:</label>
            <input type="date" id="birthdate" alt="Entrez votre date de naissance" name="birthdate" tabindex="0" max="" min="" required
                onblur="dateNow(this)" onclick="dateNow(this)" >  {*onblur (quand on quitte le champ) pour la saisie manuelle, onclick pour le calendrier*}
        </li>

        <li>
            <label for="emailAddr">Adresse e-mail&nbsp;:</label>
            <input type="email" id="emailAddr" alt="Entrez votre mail " name="emailAddr" tabindex="0" placeholder="toto@a.fr" required>
        </li>

        <li>
            <label for="emailAddrRepeat">Confirmez l'adresse e-mail&nbsp;:</label>
            <input type="email" id="emailAddrRepeat" alt="Confirmez votre mail" name="emailAddrRepeat" tabindex="0" placeholder="toto@a.fr" required
            oninput="checkMail(this)">
        </li>

        <li>
            <label for="phone">Numéro de téléphone&nbsp;:</label>
            <input type="text" id="phone" alt="Entrez votre numéro de téléphone" name="phone" tabindex="0" placeholder="0123456789" required
                   oninput="checkPhone(this)">
        </li>

        <li>
            <label for="login">Login&nbsp;:</label>
            <input type="text" id="login" alt="Entrez votre numéro de téléphone " name="login" tabindex="0" required oninput="checkLogin(this)">
        </li>

        <li>
            <label for="password">Mot de passe&nbsp;:</label>
            <input type="password" id="password_main" alt="Entrez votre mot de passe" name="password_main"  tabindex="0" required oninput="checkPassword(this)">
        </li>

        <li>
            <label for="password_addr_repeat">Confirmez votre mot de passe&nbsp;:</label>
            <input type="password" id="password_repeat" alt="Confirmez votre mot de passe" name="password_repeat" tabindex="0" required oninput="checkPasswordRepeat(this)">
        </li>

        <li>
            <input type="submit" alt="Validez le formulaire" tabindex="0" value="Valider le formulaire" />
        </li>
    </ul>
</form>
</div>
