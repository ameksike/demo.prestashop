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
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2020 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*
*  @url_base: http://localhost:8056/dev/prestashop_1.7.6.5/
*  @url_path: index.php?fc=module&module=ksinfo&controller=default
*/
class KsinfoDefaultModuleFrontController extends ModuleFrontController{

    public function init(){
        parent::init();
    }

    public function initContent() {
        parent::initContent();
        /*
            $this->module is the instance of the module responsible of the controller.
            $this->context delivers the result of Context::getContext().
            Tools::getValue('id'); to retrieved from GET vars
        */
        $id = Tools::getValue('id'); 
        if( in_array($id, [15, 16]) ){

            $data = $this->module->getWidgetVariables();
            $data['id'] = Tools::getValue('id');
            $this->context->smarty->assign($data);
            
            $this->setTemplate('module:ksinfo/views/templates/front/index.tpl');

        }else{

            Tools::redirect($this->context->link->getModuleLink('ksinfo', 'alternate', array('id' => $id)));
        }
    }
}