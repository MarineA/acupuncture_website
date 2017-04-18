<div id="formulaire_recherche_patho">
    <form method="get" action="">
        <!--<div class="element_formulaire">
            <label for="meridiens">Recherche par méridien :</label>
            <ul>
                {foreach from=$meridiens item=nom}
                    <li><input type="checkbox" id="meridiens" value={$nom}>{$nom}</li>
                {/foreach}
            </ul>
        </div>
        -->

        <div class="element_formulaire">
            <label for="symptome">Recherche par symptome:</label>
            <select>
                    {foreach from=$query item=item}
                        <option>{$item->getDesc()}</option>
                    {/foreach}

            </select>

        </div>

        <div class="element_formulaire">
            <label for="mot-cle">Recherche par mot clé :</label>
            <input type="text" id="mot-cle" placeholder="Entrez un symptôme...">
        </div>

        <input type="submit" value="Rechercher" />
    </form>
</div>