<div id="menu">
        <ul id="navigation">
           <li>
              <a href="home" tabindex="3">
                 Home
              </a> 
           </li>
            <li>
                <a href="pathologies" tabindex="2">
                    Pathologies
                </a>
            </li>
            <li>
                <a href="symptomes" tabindex="4">
                    Symptomes
                </a>
            </li>
            <li>
                <a href="informations" tabindex="1">
                    Informations
                </a>
            </li>
            <li>
                <a href="calculatrice" tabindex="0">
                    Webservices
                </a>
            </li>
            {if !isset($session)}
            <li class="liste_droite">
                <a href="inscription_form">
                    Inscription
                </a>
            </li>
            {else}
            <li class="liste_droite">
                {$session}
            </li>
            <li class="liste_droite">
                <a href="deconnexion">
                    <img id="logout" src="public/img/logout.png" alt="Déconnexion">
                </a>
            </li>
            {/if}
        </ul>
</div>

<div id="banniere"></div>

