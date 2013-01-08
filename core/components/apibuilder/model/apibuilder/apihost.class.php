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
 * @subpackage model
 */
class APIHost extends modResource {

	public $showInContextMenu = true;

	function __construct(xPDO & $xpdo) {
        parent :: __construct($xpdo);

        $this->set('class_key','APIHost');
    }

    /**
	 * {@inheritDoc}
	 * @return mixed
	 */
	public static function getControllerPath(xPDO &$modx) {
		return $modx->getOption('apibuilder.core_path',null,$modx->getOption('core_path').'components/apibuilder/').'controllers/apihost/';
	}

	/**
	 * {@inheritDoc}
	 * @return mixed
	 */
	public function getContextMenuText() {
		$this->xpdo->lexicon->load('apibuilder:default');
		return array(
			'text_create' => $this->xpdo->lexicon('apibuilder.title'),
			'text_create_here' => $this->xpdo->lexicon('apibuilder.apihost.create_here'),
		);
	}

	/**
	 * {@inheritDoc}
	 * @return mixed
	 */
	public function getResourceTypeName() {
		$this->xpdo->lexicon->load('apibuilder:default');
		return $this->xpdo->lexicon('apibuilder.apihost.new');
	}

}