{extends file='page.tpl'}

{block name='page_content'}

    <div class="col-md-6  col-sm-12"> 
            <h3><i class="icon icon-credit-card"></i> {l s='Well hello there, you try to used var id with value ' mod='ksinfo'} {$id}</h3>
            <p> &raquo; {l s='Example to insert global hook' mod='ksinfo'} : </p>
    </div>

    <!-- insert global Hook -->
    <div class="col-md-6  col-sm-12"> 
        {hook h='displayLeftColumn'}
    </div>

    <!-- controller options -->
    <div class="ksi-panel col-sm-12">
        <p>
            &raquo; {l s='Controller info' mod='ksinfo'} : <br>
            <span><strong>controller_name_1:</strong> {$controller_name1}</span> <br>
            <span><strong>controller_name_2:</strong> {$controller_name2}</span> <br>
            <!-- how to used var -->
            {assign var='controllerName' value=$smarty.get.controller}
            <span><strong>controller_name_3:</strong> {$controllerName}</span> <br>
        </p>
    </div>

    <!-- insert partials tpl -->
    <div class="ksi-panel col-sm-12">
        <p>
            &raquo; {l s='URL Use' mod='ksinfo'} : <br>
            {include file="$tpl_path/partials/urls.tpl"}
        </p>
    </div>

    <!-- insert widget -->
    <div class="ksi-panel col-sm-12">
        { widget name='<module_name>' }
    </div>

    <!-- debug data vars -->
    <div class="ksi-panel col-sm-12">
        {dump($tpl_path)}
    </div>
    

{/block}