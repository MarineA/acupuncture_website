<h1> Symptomes </h1>

<div id="formulaire_recherche_symptomes">
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
            <input type="submit" value="Rechercher" id="validationBouton"/>
        </div>

    </form>
</div>

<div id="div_tab_res">
    <table id="tab_res">
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