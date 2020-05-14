{extends file='page.tpl'}

{block name='page_content'}

    <div class="ksi-panel row">
        <h3><b>Form:</b> {$type}</h3>
        {include file="$path/views/templates/front/comment.$type.tpl"}
    </div>

{/block}