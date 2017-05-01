<div class="inscription">
<h2>Inscription </h2>

<form method="post" action="inscription" id="formulaire">

    <ul>
        <li>
            <label for="name">Nom&nbsp;:</label>
            <input type="text" id="name" name="name" placeholder="Dupont" required
                   oninput="checkFNames(this);">
        </li>

        <li>
            <label for="firstname">Prénom&nbsp;:</label>
            <input type="text" id="firstname" name="firstname" placeholder="Camille" required
                   oninput="checkFNames(this)">
        </li>

        <li>
            <label for="birthdate">Date de naissance&nbsp;:</label>
            <input type="date" id="birthdate" name="birthdate" max="" min="" required
                onblur="dateNow(this)" onclick="dateNow(this)" >  {*onblur (quand on quitte le champ) pour la saisie manuelle, onclick pour le calendrier*}
        </li>

        <li>
            <label for="emailAddr">Adresse e-mail&nbsp;:</label>
            <input type="email" id="emailAddr" name="emailAddr" placeholder="toto@a.fr" required>
        </li>

        <li>
            <label for="emailAddrRepeat">Confirmez l'adresse e-mail&nbsp;:</label>
            <input type="email" id="emailAddrRepeat" name="emailAddrRepeat" placeholder="toto@a.fr" required
            oninput="checkMail(this)">
        </li>

        <li>
            <label for="phone">Numéro de téléphone&nbsp;:</label>
            <input type="text" id="phone" name="phone" placeholder="0123456789" required
                   oninput="checkPhone(this)">
        </li>

        <li>
            <label for="login">Login&nbsp;:</label>
            <input type="text" id="login" name="login" required
                   oninput="checkLogin(this)">
        </li>

        <li>
            <label for="password">Mot de passe&nbsp;:</label>
            <input type="password" id="password_main" name="password_main"  required
                   oninput="checkPassword(this)">
        </li>

        <li>
            <label for="password_addr_repeat">Confirmez votre mot de passe&nbsp;:</label>
            <input type="password" id="password_repeat" name="password_repeat" required
                   oninput="checkPasswordRepeat(this)">
        </li>

        <li>
            <input type="submit" value="Valider le formulaire" />
        </li>
    </ul>
</form>
</div>
