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
        <input type="submit" value="Rechercher" />
    </form>
</div>
    
