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
class APIBuilder {

	public $config = array();

	function __construct(modX &$modx, array $config = array()){

		$this->modx =& $modx;

        $corePath = $this->modx->getOption('apibuilder.core_path', null, 
        	$this->modx->getOption('core_path').'components/apibuilder/');
        $assetsPath = $this->modx->getOption('apibuilder.assets_path', null, 
        	$this->modx->getOption('assets_path').'components/apibuilder/');
        $assetsUrl = $this->modx->getOption('apibuilder.assets_url', null, 
        	$this->modx->getOption('assets_url').'components/apibuilder/');

        $this->config = array_merge(array(
            'corePath' => $corePath,
            'modelPath' => $corePath.'model/',
            'processorsPath' => $corePath.'processors/',
            'controllersPath' => $corePath.'controllers/',
            'templatesPath' => $corePath.'templates/',
            // chunks and snippets

            'baseUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl.'css/',
            'jsUrl' => $assetsUrl.'js/',
            'imgUrl' => $assetsUrl.'img/',
            'connectorUrl' => $assetsUrl.'connector.php',

            'default_filenames' => array(
                'template'  => 'tp.html',
                'plugin'    => 'pl.php',
                'snippet'   => 'sn.php',
                'chunks'    => 'ch.html'),
        ),$config);

        $this->modx->addPackage('apibuilder', $this->config['modelPath']);

        if ($this->modx->lexicon) {
            $this->modx->lexicon->load('apibuilder:default');
        }

	}
}