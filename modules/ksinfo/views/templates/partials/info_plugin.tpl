
<h3><i class="icon icon-credit-card"></i> {l s='Plugin Info' mod='ksinfo'}</h3>
<p>
    &raquo; {l s='You can get a plugin information from backoffices module' mod='ksinfo'} :</li>
    <ul>
        <li><span> <strong>  Name: </strong>  {$displayName} </span> </li>
        <li><span> <strong>  Version: </strong>  {$version} </span> </li>
        <li><span> <strong>  Email: </strong>  {$KSINFO_ACCOUNT_EMAIL} </span> </li>
        <li><span> <strong>  Pass: </strong>  {$KSINFO_ACCOUNT_PASSWORD} </span> </li>
        <li><span> <strong>  Live Mode: </strong>  {if $KSINFO_LIVE_MODE} {l s='Yes.' mod='ksinfo'} {else} {l s='No.' mod='ksinfo'} {/if} </span> </li>
        <li><span> <strong>  Path: </strong>  {$module_path} </span> </li>
    </ul>
</p>