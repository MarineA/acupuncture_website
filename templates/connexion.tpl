<div class="connexion">
<h2> Connexion </h2>
    
   <form method="post" action="session/connexion" id="formulaire">

    <ul>
        <li>
            <label for="email_addr">Adresse e-mail&nbsp;:</label>
            <input type="email" id="email_addr" name="email_addr" required oninput="checkMail(this)">
        </li>
        <li>
            <label for="password">Mot de passe&nbsp;:</label>
            <input type="password" id="password" name="password" pattern="[a-z]+[A-Z]+[0-9]+]{6}" required oninput="checkPassword(this)">
        </li>
        <li>
            <input type="submit" value="Connexion" /> 
        </li>
    </ul>
</form>
    
    
</div>