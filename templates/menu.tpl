<div id="menu">
    <section id="section">
        {* We generate the menu list from the available pages in the menu *} 
        <ul id="navigation"> 
        {foreach key=url_val item=template_name from=$menu} 
           <li> 
              <a href="{$SCRIPT_NAME}?{$page_var}={$url_val}"> 
                 {$url_val}<br /> 
              </a> 
           </li> 
        {/foreach} 
        </ul>  
    </section>
</div>

<div class="center">
    <section></section>
</div>