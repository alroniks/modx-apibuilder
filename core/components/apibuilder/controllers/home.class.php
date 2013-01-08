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

class APIBuilderHomeManagerController extends APIBuilderMainController {

    public function process(array $scriptProperties = array()){}

    public function getPageTitle() {
        return $this->modx->lexicon('apibuilder.title');
    }

    public function loadCustomCssJs() {
        $this->addCss($this->apibuilder->config['cssUrl'].'apibuilder.css');
        $this->addJavascript($this->apibuilder->config['jsUrl'].'widgets/elements.grid.js');
        $this->addJavascript($this->apibuilder->config['jsUrl'].'widgets/files.grid.js');
        $this->addJavascript($this->apibuilder->config['jsUrl'].'widgets/common.tab.js');

        $this->addJavascript($this->apibuilder->config['jsUrl'].'widgets/home.panel.js');
        $this->addLastJavascript($this->apibuilder->config['jsUrl'].'sections/home.js');
    }

    public function getTemplateFile() {
        return $this->apibuilder->config['templatesPath'].'home.tpl';
    }

}