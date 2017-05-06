<div id="formulaire_recherche_patho">
    <form method="get" action="symptomes">


        <div class="element_formulaire">
            <label for="patho">Recherche par patho:</label>
            <select name="patho">
                    {foreach from=$pathos item=item}
                        <option>{$item->getDesc()}</option>
                    {/foreach}

            </select>
        </div>

        <div class="element_formulaire">
            <label for="keyword">Recherche par mot-clé:</label>
            <select name="keyword">
                {foreach from=$keywords item=item}
                    <option>{$item->getName()}</option>
                {/foreach}

            </select>
        </div>

        <input type="submit" value="Rechercher" />

    </form>
</div>



<!--
<div id="resultat">
    <table id="tab_patho">
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

