{extends file='parent:frontend/detail/data.tpl'}
{* Default price *}
{block name='frontend_detail_data_price_configurator'}
    {if $sArticle.priceStartingFrom && !$sArticle.sConfigurator && $sView}
        {* Price - Starting from *}
        {block name='frontend_detail_data_price_configurator_starting_from_content'}
            <span class="price--content content--starting-from">
                                {s name="DetailDataInfoFrom"}{/s} {$sArticle.priceStartingFrom|currency} {s name="Star" namespace="frontend/listing/box_article"}{/s}
                            </span>
        {/block}
    {else}
        {* Regular price *}
        {block name='frontend_detail_data_price_default'}
            <span class="price--content content--default">
                <meta itemprop="price" content="{$sArticle.price|replace:',':'.'}">
                            {if $sArticle.priceStartingFrom}{s name='ListingBoxArticleStartsAt' namespace="frontend/listing/box_article"}{/s} {/if}{$sArticle.price|currency} {s name="Star" namespace="frontend/listing/box_article"}{/s}
                            </span>
        {/block}
    {/if}
{/block}
