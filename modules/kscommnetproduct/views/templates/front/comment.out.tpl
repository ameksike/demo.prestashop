{extends file='page.tpl'}

{block name='page_content'}

    <div class="ksi-panel row">
        {if $comments} 
            <u>
                {foreach from=$comments item=item key=key name=name}
                    <li> {$item.comment} </li>
                {/foreach}
            </u>
        {/if}
    </div>


    <div class="ksi-panel row">
        {include file="$path/views/templates/front/comment.tpl"}
    </div>
{/block}