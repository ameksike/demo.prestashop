<?php
/*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
include_once __DIR__ . "/CommentModel.php";
class CommentRepository
{
    public $table;

    public function __construct(){
        $this->table = _DB_PREFIX_. CommentModel::$definition['table'];
    }

    public function save($params){
        $model = new CommentModel();
        $model->user_id = isset($params['user_id']) ? $params['user_id'] : 1 ;
        $model->product_id = isset($params['product_id']) ? $params['product_id'] : 1 ;
        $model->comment = isset($params['comment']) ? $params['comment'] : '-' ;
        return $model->save();
    }

    public function get($id=false){
        $sql = "SELECT * FROM {$this->table} ";
        if($id){ 
            $sql .= " WHERE id_comment=$id ";
        }
        return Db::getInstance()->executeS($sql.';');
    }
}