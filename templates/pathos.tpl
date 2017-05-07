<h1> Pathologies </h1>

<!-- Formulaire de recherche -->
<div id="formulaire_recherche_pathos">
    <form method="get" action="pathologies">

        <!-- Par symptome -->
        <div class="element_formulaire">
            <label for="symptome">Recherche par symptôme :</label>
            <select name="symptome" id="symptome">
                <option value="" >--</option>
                {foreach from=$symptomes item=item}
                    <option >{$item->getDesc()}</option>
                {/foreach}
            </select>
        </div>

        <!-- Par méridien -->
        <div class="element_formulaire">
            <label for="meridien">Recherche par méridien :</label>
            <select name="meridien" id="meridien">
                    <option value="" >--</option>
                {foreach from=$meridiens item=item}
                    <option >{$item}</option>
                {/foreach}
            </select>
        </div>

        <!-- Par type -->
        <div class="element_formulaire">
            <label for="type">Recherche par type de pathologie :</label>
            <select name="type" id="type">
                <option value="">--</option>
                {foreach from=$types item=item}
                    <option >{$item}</option>
                {/foreach}
            </select>
        </div>

        <div class="element_formulaire">
        <input type="submit" value="Rechercher" id="validationBouton" />
        </div>

    </form>
</div>

<!-- Affichage des pathos -->
<div id="div_tab_res">
     <table id="tab_res">
        <caption>Liste des pathologies</caption>
        <tr>
            <th id="th_type" >Type</th>
            <th id="th_meridien">Méridien</th>
            <th id="th_descr">Description</th>
        </tr>
        {foreach from=$query item=item}
          <tr>
            <td headers="th_type">{$item->getType()}</td>
            <td headers="th_meridien">{$item->getMer()}</td>
            <td headers="th_descr">{$item->getDesc()}</td>
          </tr>
        {/foreach}
    </table>
</div>
    
