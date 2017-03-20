<table id="tab_patho">
    <tr>
        <th>Type</th>
        <th>Méridien</th>
        <th>Description</th> 
    </tr>
    {foreach from=$listePatho item=item}
      <tr>
        <td>{$item['type']}</td>
        <td>{$item['mer']}</td>
        <td>{$item['desc']}</td> 
      </tr>
    {/foreach}
</table>
    
