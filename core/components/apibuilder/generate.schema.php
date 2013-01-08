<?php
define('MODX_API_MODE', true);
//require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/index.php';
require_once '/home/alroniks/dev/modx/226/index.php'; // TODO: вынести в config.core.php
/*******************************************************/

$package = 'apibuilder'; // Class name for generation
$suffix = 'apib_'; // Suffix of tables.
$prefix = $modx->config['table_prefix']; // table prefix

// Folders for schema and model
$Model = dirname(__FILE__).'/model/';
$Schema = dirname(__FILE__).'/model/schema/';
$xml = $Schema.$package.'.mysql.schema.xml';

// Remove old files
rrmdir($Model.$package .'/mysql');
//unlink($xml);

/*******************************************************/

$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_ERROR);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');
$modx->error->message = null;
$modx->loadClass('transport.modPackageBuilder', '', false, true);
$manager = $modx->getManager();

$generator = $manager->getGenerator();
$generator->parseSchema($xml, $Model);
$modx->addPackage($package, $Model);

//$manager->removeObjectContainer('TicketComment');
//$manager->removeObjectContainer('TicketThread');
//$manager->removeObjectContainer('TicketAttachment');
//$manager->removeObjectContainer('TicketVote');
//$manager->removeObjectContainer('TicketView');

//$manager->createObjectContainer('TicketComment');
//$manager->createObjectContainer('TicketThread');
//$manager->createObjectContainer('TicketAttachment');
//$manager->createObjectContainer('TicketVote');
//$manager->createObjectContainer('TicketView');

print "\nDone\n";


/********************************************************/
function rrmdir($dir) {
	if (is_dir($dir)) {
		$objects = scandir($dir);

		foreach ($objects as $object) {
			if ($object != "." && $object != "..") {
				if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
			}
		}

		reset($objects);
		rmdir($dir);
	}
} 