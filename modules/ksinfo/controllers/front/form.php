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
class KsinfoFormModuleFrontController extends ModuleFrontController{

    public function init(){
        parent::init();
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->addCSS($this->module->path .'css/formctrl.css');
        $this->addJS($this->module->path .'js/formctrl.js');
        /*
            $this->context->controller->addJS(($this->_path).'js/checkout.js'); 
            $this->registerStylesheet
            (
                'module-stockists-style',
                'modules/stockists/views/css/stockists.css',
                [
                    'position' => 'head',
                    'priority' => 150,
                ]
            );
        */
    }

    public function initContent() {
        parent::initContent();
        $this->setSmartTemplate("views/templates/front/form.tpl", [
            "url"=>$this->module->url,
            "path"=>$this->module->path,
            "title"=>Tools::getValue('title'),
            "msg"=> Tools::getValue('message')
        ]);
        // Tools::jsonEncode(["data"=>[]]);
    }

    public function postProcess()
	{
        if (Tools::isSubmit('btnFrmSend'))
        {
            $this->setTemplate("views/templates/front/form.tpl", [
                "title"=>Tools::getValue('title'),
                "msg"=> Tools::getValue('message')
            ]);

        }else{
            parent::postProcess();
        }
    } 

    private function setSmartTemplate($tpl, $params=false, $moduleName='ksinfo'){
        if($params) $this->context->smarty->assign($params);
        if (Tools::version_compare(_PS_VERSION_, '1.7', '>=')) {
            $this->setTemplate("module:$moduleName/$tpl");
        } else {
            $this->setTemplate($this->module->path, $tpl);
            //$this->display(__FILE__, 'views/blockcategories_admin.tpl');
        }
    }
   
}