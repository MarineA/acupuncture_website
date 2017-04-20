<div id="formulaire_recherche_patho">
    <form method="get" action="pathologies">


        <div class="element_formulaire">
            <label for="symptome">Recherche par symptome:</label>
            <select name="symptomes">
                    {foreach from=$query item=item}
                        <option>{$item->getDesc()}</option>
                    {/foreach}

            </select>

        </div>
        <input type="submit" value="Rechercher" />

        <!--<div class="element_formulaire">
            <label for="mot-cle">Recherche par mot clé :</label>
            <input type="text" id="mot-cle" placeholder="Entrez un symptôme...">
        </div>
        -->




    </form>
</div>

<div id="resultat">


</div>