<h3><i class="icon icon-credit-card"></i> {l s='Shop info' mod='ksinfo'}</h3>
<p>
    &raquo; {l s='You can get a shop information from backoffices ' mod='ksinfo'} :
    <ul>
            <li><span> <strong>  Language: </strong> {$idiom} </span> </li>
            <li><span> <strong>  Time Zone: </strong> {$timezone}</span> </li>
            <li><span> <strong>  Distance Unit: </strong> {$distanceunit} </span> </li>
            <li><span> <strong>  Shop Mail: </strong> {$shopmail}</span> </li>
            <li><span> <strong>  Days for New Products: </strong> {$daynewproduct} </span> </li>
            <li><span> <strong>  PS Version: </strong> {$PS_VERSION} </span> </li>
            <li><span> <strong>  Multistore: </strong> {if $multistore} {l s='Yes.' mod='ksinfo'} {else} {l s='No.' mod='ksinfo'} {/if} </span> </li>
            <li><span> <a href="https://devdocs.prestashop.com/1.7/modules/creation/displaying-content-in-front-office/"> <strong>  More </strong> </a> </li>
    </ul>
</p>
