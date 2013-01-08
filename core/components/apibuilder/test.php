<?php

define('MODX_API_MODE', true);
require_once '/home/alroniks/dev/modx/226/index.php'; // TODO: вынести в config.core.php

$modx->addExtensionPackage('apibuilder', MODX_CORE_PATH.'components/apibuilder/model/');