<table id="tab_patho">
    <tr>
        <th>Type</th>
        <th>Méridien</th>
        <th>Description</th> 
    </tr>
    {foreach from=$query item=item}
      <tr>
        <td>{$item->getType()}</td>
        <td>{$item->getMer()}</td>
        <td>{$item->getDesc()}</td>
      </tr>
    {/foreach}
</table>

<div id="formulaire_recherche_patho">
    <form method="get" action="resultats">

        <div class="element_formulaire">
            <label for="symptomes">Recherche par symptome:</label>
            <select name="symptomes">
                {foreach from=$query3 item=item}
                    <option >{$item->getDesc()}</option>
                {/foreach}

            </select>

        </div>
        <input type="submit" value="Rechercher" />
    </form>
</div>

<div id="formulaire_recherche_patho">
    <form method="get" action="resultatsM">

        <div class="element_formulaire">
            <label for="meridiens">Recherche par meridien:</label>
            <select name="meridiens">
                {foreach from=$query2 item=item}
                    <option >{$item}</option>
                {/foreach}

            </select>

        </div>
        <input type="submit" value="Recherche" />
    </form>
</div>

    
