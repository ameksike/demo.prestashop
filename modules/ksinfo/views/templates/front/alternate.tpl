{extends file='page.tpl'}

{block name='page_content'}

    <div class="ksi-panel row">
        <div class="col-md-4  col-sm-12">
            {include file="$tpl_path/partials/info_shop.tpl"}
        </div>
        <div class="col-md-4  col-sm-12">
            {include file="$tpl_path/partials/info_plugin.tpl"}
        </div>
        <div class="col-md-4  col-sm-12">
            {include file="$tpl_path/partials/info_docs.tpl"}
        </div>
    </div>

{/block}