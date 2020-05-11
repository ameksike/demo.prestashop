{*
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
*}

<div class="panel">
	<h3><i class="icon icon-credit-card"></i> {l s='KsInfo' mod='ksinfo'}</h3>
	<p>
		<strong>{l s='Here is my new generic module!' mod='ksinfo'}</strong><br />
		{l s='Thanks to PrestaShop, now I have a great module.' mod='ksinfo'}<br />
		{l s='I can configure it using the following configuration form.' mod='ksinfo'}<br /><br />

		<strong>{l s='It module show you how to:' mod='ksinfo'}</strong>
		<ul>
			<li> {l s='Used controllers and render globals hook' mod='ksinfo'} </li>
			<li> {l s='Used controllers and redirect to other controller' mod='ksinfo'} </li>
			<li> {l s='Used partials template extension' mod='ksinfo'} </li>
			<li> {l s='Used partials inclusions in global template' mod='ksinfo'} </li>
		</ul>
		
	</p>
</div>

<div class="panel">
	{include file="$tpl_path/partials/info_shop.tpl"}
</div>
<div class="panel">
	{include file="$tpl_path/partials/info_plugin.tpl"}
</div>
<div class="panel">
	{include file="$tpl_path/partials/info_docs.tpl"}
</div>