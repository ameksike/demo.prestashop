
<?php
/*
* 2007-2020 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    Antonio Membrides Espinosa <tonykssa@gmail.com>
*  @copyright 2007-2020 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*
*  @url_base: http://localhost:8056/dev/prestashop_1.7.6.5/
*  @url_path: index.php?fc=module&module=ksinfo&controller=default
*/

class KsModuleFrontController extends ModuleFrontController{

public function init(){
    parent::init();
}

public function initContent() {
    
    parent::initContent();
    $this->dispatch();

}

private function dispatch(){
    $action = Tools::getValue('action', 'index');
    $type = Tools::getValue('type', 'json');
    $result = '';

    if(method_exists($this, $action)){
        $result = $this->{$action}(Tools::getAllValues());
    }

    if($type=='json'){
        $this->ajax = true;
        header('Content-Type: application/json');
        die(Tools::jsonEncode( $result ));
    }else{
        echo $result;
    }
}

public function index(){
    return '';
}

}
