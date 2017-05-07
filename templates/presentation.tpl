<div id="connexion">
    {if !isset($session)}
    <h1> Connexion </h1>
    <form method="post" action="connexion" id="formulaire_presentation">

        <ul>
            <li>
                <label for="login">Login&nbsp;:</label>
                <input type="text" id="login" name="login" tabindex="0" required oninput="checkLogin(this)">
            </li>
            <li>
                <label for="password_main">Mot de passe&nbsp;:</label>
                <input type="password" id="password_main" name="password_main" tabindex="0" pattern="[a-z]+[A-Z]+[0-9]+]{6}" required oninput="checkPassword(this)">
            </li>
            <li>
                <input type="submit" tabindex="0" value="Connexion" />
            </li>
        </ul>
    </form>
    {else}
        <h1>Bonjour {$session}</h1>
    {/if}
</div>

<div id="introduction">
    <h1>Remède par l'acupuncture</h1>
    <p>
        Site web dédié à l'acupuncture.
    </p>
</div>

<div id="flux_rss">

    <h1>Flux RSS : santé</h1>
    {foreach from=$donnee_rss->item item=item}
        <div class="rss_article">
            <div class="rss_title">
                {$item->title}
            </div>
            <div class="rss_description">
                <p>{$item->description}</p>
                <a href={$item->link}>Lire l'article...</a>
            </div>
        </div>
        <! -- On n'affiche que 10 articles -->
        {if $item@index eq 9}
            {break}
        {/if}
    {/foreach}

</div>



			