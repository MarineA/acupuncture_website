<div id="flux_rss">

    {foreach from=$donnee_rss->item item=item}
        <div class="rss_article">
            <div class="rss_title">
                {$item->title}
            </div>
            <div class="rss_description">
                <p>{$item->description}</p>
                <a href={$item->link}>Lire l'article...</a>
            </div>
        </div>
        <! -- On n'affiche que 10 articles -->
        {if $item@index eq 9}
            {break}
        {/if}
    {/foreach}

</div>