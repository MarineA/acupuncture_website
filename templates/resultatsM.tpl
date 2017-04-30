<p>Resultats</p>

<table id="tab_patho">
    <tr>
        <th>Type</th>
        <th>Méridien</th>
        <th>Description</th>
    </tr>
    {foreach from=$query5 item=item}
        <tr>
            <td>{$item->getType()}</td>
            <td>{$item->getMer()}</td>
            <td>{$item->getDesc()}</td>
        </tr>
    {/foreach}
</table>