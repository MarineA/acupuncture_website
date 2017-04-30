<div class="connexion">
<h2> Connexion </h2>
    
   <form method="post" action="connexion" id="formulaire">

    <ul>
        <li>
            <label for="login">Login&nbsp;:</label>
            <input type="text" id="login" name="login" required
                   oninput="checkLogin(this)">
        </li>

        <li>
            <label for="email_addr">Adresse e-mail&nbsp;:</label>
            <input type="email" id="emailAddr" name="emailAddr" required oninput="checkMail(this)">
        </li>
        <li>
            <label for="password">Mot de passe&nbsp;:</label>
            <input type="password" id="password_main" name="password_main" pattern="[a-z]+[A-Z]+[0-9]+]{6}" required oninput="checkPassword(this)">
        </li>
        <li>
            <input type="submit" value="Connexion" /> 
        </li>
    </ul>
</form>
    
    
</div>