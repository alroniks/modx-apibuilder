<?php
/**
 * API Builder
 *
 * Copyright 2012 by Ivan Klimchuk <ivan@klimchuk.com>
 *
 * API Builder is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * API Builder is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * API Builder; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package apibuilder
 */

require_once dirname(__FILE__) . '/model/apibuilder/apibuilder.class.php';

abstract class APIBuilderMainController extends modExtraManagerController {

	/** @var APIBuilder $apibuilder */
	public $apibuilder;

	public function initialize() {

		$this->apibuilder = new APIBuilder($this->modx);

		$this->modx->regClientCSS($this->apibuilder->config['cssUrl'].'mgr/apibuilder.css');
		$this->modx->regClientStartupScript($this->apibuilder->config['jsUrl'].'mgr/apibuilder.js');
		$this->modx->regClientStartupHTMLBlock('<script type="text/javascript">
			Ext.onReady(function(){
				APIBuilder.config = '.$this->modx->toJSON($this->apibuilder->config).';
				APIBuilder.config.connector_url = "'.$this->apibuilder->config['connectorUrl'].'";
			});
		</script>');

		parent::initialize();
	}

	public function getLanguageTopic() {
		return array('apibuilder:default');
	}

	public function checkPermissions() { return true; }
}

class IndexManagerController extends APIBuilderMainController {
	public static function getDefaultController() { return 'home'; }
}