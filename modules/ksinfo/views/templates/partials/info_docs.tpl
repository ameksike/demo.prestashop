<h3><i class="icon icon-tags"></i> {l s='Documentation' mod='ksinfo'}</h3>
<p >
    &raquo; {l s='You can get a documentation to configure this module' mod='ksinfo'} :
    <ul class="docs_list">
        <li>+ <a href="{$url_controller_default}" target="_blank">{l s='Controller - insert global Hook' mod='ksinfo'}</a></li>
        <li>+ <a href="{$url_controller_alternate}" >{l s='Controller - redirect to other controller' mod='ksinfo'}</a></li>
        <li>+ <a href="{$url_controller_alternate}" >{l s='Controller - redirect to other controller' mod='ksinfo'}</a></li>
        <!-- $link->getModuleLink does not work on module dashboard -->
        <li>+ <a href=" {if $link} {$link->getModuleLink('ksinfo', 'form')} {/if} "> {l s='Controller - forms, js, css, img' mod='ksinfo'} </a></li>

    </ul>
</p>