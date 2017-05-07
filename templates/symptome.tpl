<h1> Symptômes </h1>


<!-- Formulaire de recherche -->
<div id="formulaire_recherche_symptomes">
    <form method="get" action="symptomes">

        <!-- Par patho -->
        <div class="element_formulaire">
            <label for="patho">Recherche par pathologie :</label>
            <select name="patho" id="patho">
                <option>--</option>
                {foreach from=$pathos item=item}
                    <option>{$item->getDesc()}</option>
                {/foreach}
            </select>
        </div>

        <!-- Par mot clé uniquement lors d'une connexion -->
        {if isset($session)}
        <div class="element_formulaire">
            <label for="keyword">Recherche par mot-clés :</label>
            <select name="keyword" id="keyword">
                <option>--</option>
                {foreach from=$keywords item=item}
                    <option>{$item}</option>
                {/foreach}
            </select>
        </div>
        {/if}

        <div class="element_formulaire">
            <input type="submit" value="Rechercher" id="validationBouton"/>
        </div>

    </form>
</div>


<!-- affichage des symptomes -->
<div id="div_tab_res">
    <table id="tab_res">
        <caption>Liste des symptômes</caption>
        <tr>
            <th>Description</th>
        </tr>
        {foreach from=$query item=item}
            <tr>
                <td>{$item->getDesc()}</td>
            </tr>
        {/foreach}
    </table>

</div>

