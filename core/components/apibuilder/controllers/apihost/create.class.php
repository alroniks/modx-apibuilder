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
 * @subpackage controllers
 */
class APIHostCreateManagerController extends ResourceCreateManagerController {
	/**
	 * Returns language topics
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('resource','apibuilder:default');
	}

	/**
	 * Check for any permissions or requirements to load page
	 * @return bool
	 */
	public function checkPermissions() {
		return $this->modx->hasPermission('new_document');
	}

	/**
     * Return the pagetitle
     *
     * @return string
     */
    public function getPageTitle() {
        return $this->modx->lexicon('apibuilder.apihost.new');
    }

    /**
     * Return the location of the template file
     * @return string
     */
    public function getTemplateFile() {
        return MODX_CORE_PATH . 'components/apibuilder/templates/apihost/create.tpl';

    }

    /**
     * Register custom CSS/JS for the page
     * @return void
     */
    public function loadCustomCssJs() {

    	$mgrUrl = $this->modx->getOption('manager_url',null,MODX_MANAGER_URL);
    	$apibuilderAssetsUrl = $this->modx->getOption('apibuilder.assets_url',null,
    		$this->modx->getOption('assets_url',null,MODX_ASSETS_URL).'components/apibuilder/');

    	$connectorUrl = $apibuilderAssetsUrl.'connector.php';
		$apibuilderJsUrl = $apibuilderAssetsUrl.'js/mgr/';

    	$this->addJavascript($mgrUrl.'assets/modext/util/datetime.js');
    	$this->addJavascript($mgrUrl.'assets/modext/widgets/element/modx.panel.tv.renders.js'); 
    	$this->addJavascript($mgrUrl.'assets/modext/widgets/resource/modx.grid.resource.security.local.js');
		$this->addJavascript($mgrUrl.'assets/modext/widgets/resource/modx.panel.resource.tv.js');
		$this->addJavascript($mgrUrl.'assets/modext/widgets/resource/modx.panel.resource.js');
		$this->addJavascript($mgrUrl.'assets/modext/sections/resource/create.js');

		$this->addJavascript($apibuilderJsUrl.'apibuilder.js');

		$this->addLastJavascript($apibuilderJsUrl.'apihost/create.js');


    	// title, public or hidden (only admins or other users), 
    	$this->addHtml('
		<script type="text/javascript">
		// <![CDATA[
		APIBuilder.config = {
			assets_url: "'.$apibuilderAssetsUrl.'"
			,connector_url: "'.$connectorUrl.'"
		}
		MODx.config.publish_document = "'.$this->canPublish.'";
		MODx.onDocFormRender = "'.$this->onDocFormRender.'";
		MODx.ctx = "'.$this->ctx.'";
		Ext.onReady(function() {
			MODx.load({
				xtype: "apibuilder-page-apihost-create"
				,record: '.$this->modx->toJSON($this->resourceArray).'
				,publish_document: "'.$this->canPublish.'"
				,canSave: "'.($this->modx->hasPermission('save_document') ? 1 : 0).'"
				,show_tvs: '.(!empty($this->tvCounts) ? 1 : 0).'
				,mode: "create"
			});
		});
		// ]]>
		</script>');
        /* load RTE */
        //$this->loadRichTextEditor();
    }


}