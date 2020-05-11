<div class="row">
    <strong>Prestashop 1.6</strong> : {$link->getModuleLink('ksinfo')} <br>
    <strong>Prestashop 1.7</strong> : {url entity='module' name='ksinfo' controller='default' params = ['pk1' => 'v1', 'pk2' => 'v2']} <br>
    <br>
    <strong>Prestashop 1.6</strong> : {$link->getPageLink('myPageName')}  <br>
    <strong>Prestashop 1.7</strong> : {url entity='myPageName' params = ['pk1' => 'v1', 'pk2' => 'v2']} <br>
    <br>
    <strong>Prestashop 1.6</strong> : { $link->getCategoryLink('category') } <br>
    <strong>Prestashop 1.7</strong> : { url entity='category' id=1 id_lang=2 } <br>
    <br>
    <strong>Prestashop 1.6</strong> : { $link->getCatImageLink('') } <br>
    <strong>Prestashop 1.7</strong> : { url entity='categoryImage' id=3 name='home-default' } <br>  
</div>