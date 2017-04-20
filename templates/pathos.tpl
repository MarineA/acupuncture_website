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
    <form method="get" action="pathologies">

        <div class="element_formulaire">
            <label for="symptomes">Recherche par symptome:</label>
            <select name="symptomes">
                {foreach from=$query item=item}
                    <option value="symptome">{$item->getDesc()}</option>
                {/foreach}

            </select>

        </div>
        <input type="submit" value="Rechercher" />
    </form>
</div>
    
