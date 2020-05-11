{extends file='page.tpl'}

{block name='page_content'}
    <div class="col-md-6  col-sm-12"> 
            <h3><i class="icon icon-credit-card"></i> {l s='Well hello there, you try to used var id with value ' mod='ksinfo'} {$id}</h3>
            <p>
                &raquo; {l s='Example to insert global hook' mod='ksinfo'} :
            </p>
    </div>

    <!-- insert global Hook -->
    <div class="col-md-6  col-sm-12"> 
        {hook h='displayLeftColumn'}
    </div>

    <!-- insert partials tpl -->
    <div class="ksi-panel col-sm-12">
        {include file="$tpl_path/partials/urls.tpl"}
    </div>
{/block}