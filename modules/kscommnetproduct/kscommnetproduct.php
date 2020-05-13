<?php
/**
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
*  International Registered Trademark & Property of PrestaShop SA
*/

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
include __DIR__ . '/controllers/local/installer.php';

if (!defined('_PS_VERSION_')) {
    exit;
}

class KsCommnetProduct extends Module implements WidgetInterface
{
    protected $config_form = false;
    public $path = false;

    public function __construct()
    {
        $this->name = 'kscommnetproduct';
        $this->version = '1.0.0';
        $this->author = 'Antonio Membrides Espinosa';
        $this->need_instance = 1;
        $this->bootstrap = true;
        $this->tab = 'front_office_features';
        $this->path = __DIR__;

        parent::__construct();

        $this->displayName = $this->trans('KsCommnetProduct', [], "Modules.KsCommnetProduct.Admin");
        $this->description = $this->trans('Add Ksike demo plugin to allow store users to leave a comment for product.', [], "Modules.KsCommnetProduct.Admin");

        $this->confirmUninstall = $this->l('');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return  parent::install() 
                && $this->registerHook('displayFooterProduct')
                && KsCommnetProductInstaller::install()
        ;
    }

    public function uninstall()
    {
        return  parent::uninstall() 
                && KsCommnetProductInstaller::uninstall()
        ;
    }

    public function renderWidget($hookName, array $configuration){
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        return $this->fetch("module:kscommnetproduct/views/templates/front/comment.tpl");
    }

    public function getWidgetVariables($hookName, array $configuration){
        return [
            'message'=>'Hello, this product is great!'
        ];
    }
}
