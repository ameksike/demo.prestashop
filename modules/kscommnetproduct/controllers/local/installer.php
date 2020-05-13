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
class KsCommnetProductInstaller
{
    public static $dbname = 'ks_product_comment';

    public static function install()
    {
        return Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_ . self::$dbname .'` (
                `id_comment` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `user_id` int(10) unsigned NOT NULL ,
                `product_id` int(10) unsigned NOT NULL ,
                `comment` VARCHAR(100) NOT NULL,
                PRIMARY KEY (`id_comment`)
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;'
        );
    }

    public static function uninstall()
    {
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `' . _DB_PREFIX_ . self::$dbname . '`;');
    }
}