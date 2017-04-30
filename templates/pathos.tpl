<div id="formulaire_recherche_patho">
    <form method="get" action="recherches">

        <div class="element_formulaire">
            <label for="symptomes">Recherche par symptome:</label>
            <select name="symptomes">
                <option ></option>
                {foreach from=$symptomes item=item}
                    <option >{$item->getDesc()}</option>
                {/foreach}

            </select>

        </div>

        <div class="element_formulaire">
            <label for="meridiens">Recherche par meridien:</label>
            <select name="meridiens">
                    <option ></option>
                {foreach from=$meridiens item=item}
                    <option >{$item}</option>
                {/foreach}

            </select>

        </div>

        <input type="submit" value="Rechercher" />
    </form>
</div>

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

    
