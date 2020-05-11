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

if (!defined('_PS_VERSION_')) {
    exit;
}


class Ksinfo extends Module 
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'ksinfo';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Antonio Membrides Espinosa';
        $this->need_instance = 1;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('KsInfo Demo Plugin');
        $this->description = $this->l('add Ksike Information demo plugin to show a small panel informative about your Shop and your plugin.');

        $this->confirmUninstall = $this->l('');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('KSINFO_LIVE_MODE', false);

        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayHome') &&
            $this->registerHook('displayLeftColumn') &&
            $this->registerHook('displayRightColumn');
    }

    public function uninstall()
    {
        Configuration::deleteByName('KSINFO_LIVE_MODE');

        include(dirname(__FILE__).'/sql/uninstall.php');

        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitKsinfoModule')) == true) {
            $this->postProcess();
        }
        
        $this->context->smarty->assign($this->getWidgetVariables());
        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitKsinfoModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Live mode'),
                        'name' => 'KSINFO_LIVE_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Use this module in live mode'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'desc' => $this->l('Enter a valid email address'),
                        'name' => 'KSINFO_ACCOUNT_EMAIL',
                        'label' => $this->l('Email'),
                    ),
                    array(
                        'type' => 'password',
                        'name' => 'KSINFO_ACCOUNT_PASSWORD',
                        'label' => $this->l('Password'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'KSINFO_LIVE_MODE' => Configuration::get('KSINFO_LIVE_MODE', true),
            'KSINFO_ACCOUNT_EMAIL' => Configuration::get('KSINFO_ACCOUNT_EMAIL', 'tonykssa@gmail.com.com'),
            'KSINFO_ACCOUNT_PASSWORD' => Configuration::get('KSINFO_ACCOUNT_PASSWORD', 'demo'),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();
        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }

    public function hookDisplayHome()
    {
        /* Place your code here. */
       return $this->renderWidget('displayHome');
    }

    public function hookDisplayLeftColumn()
    {
        /* Place your code here. */
       return $this->renderWidget('displayLeftColumn');
    }

    public function hookDisplayRightColumn()
    {
        /* Place your code here. */
       return $this->renderWidget('displayRightColumn');
    }

    /**
     * @inheritdoc
     * @param string $hookName
     * @param array $configuration
     * @return string
     */
    public function renderWidget($hookName = null, array $configuration = [])
    {
        if (!$this->active) {
            return;
        }
        
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
        $this->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        return $this->display(__FILE__, 'views/templates/hook/'.$hookName.'.tpl');
    }

    /**
     * @param string|null $hookName
     * @param array $configuration
     * @return array
     * @throws Exception
     */
    public function getWidgetVariables($hookName = null, array $configuration = [])
    {
        $cfg = $this->getConfigFormValues();

        $cfg['idiom'] = Configuration::get('PS_LANG_DEFAULT');
        $cfg['timezone'] = Configuration::get('PS_TIMEZONE');
        $cfg['distanceunit'] = Configuration::get('PS_DISTANCE_UNIT');
        $cfg['shopmail'] = Configuration::get('PS_SHOP_EMAIL');
        $cfg['daynewproduct'] = Configuration::get('PS_NB_DAYS_NEW_PRODUCT');    
        $cfg['multistore'] = Shop::isFeatureActive();
        $cfg['PS_VERSION'] = _PS_VERSION_;
        $cfg['displayName'] = $this->displayName;
        $cfg['version'] = $this->version;
        $cfg['url_controller_default'] = Context::getContext()->link->getModuleLink('ksinfo', 'default', array('id' => 15));
        $cfg['url_controller_alternate'] = Context::getContext()->link->getModuleLink('ksinfo', 'default', array('id' => 17));
        $cfg['tpl_path'] = __DIR__ . '/views/templates';
        $cfg['module_path'] = $this->_path;
        $cfg['id_module'] = $this->id;
        $cfg['token'] = $this->context->cookie->contactFormToken;

        switch($hookName){
            case 'displayHome':
                $cfg['title'] = 'home';  
            break;
            case 'displayLeftColumn':
                $cfg['title'] = 'home';  
            break;
            case 'displayRightColumn':
                $cfg['title'] = 'home';  
            break;
        }

        return $cfg;
    }


    # extraer la ubicacion  (latitud y longitud)
    # desde Google Maps
    #  https://gist.github.com/xombra
    function weather($latitude='22.1495705', $longitude='-80.4466171')
    { 
        $url = "http://api.openweathermap.org/data/2.5/weather?lat=$latitud&lon=$longitud&units=metric";
        $clima = file_get_contents($url);
        $json = json_decode($clima);
        return array(
            'humidity'=> $json->main->humidity,
            'speed' => $json->main->speed,
            'temp'=> $json->main->temp,
            'temp_max'=> $json->main->temp_max,
            'temp_min'=> $json->main->temp_min,
            'pressure'=> $json->main->pressure,
        );
    }
}
