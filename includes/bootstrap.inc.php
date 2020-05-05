<?php
error_reporting(-1);

define('ROOTPATH', dirname(dirname(__FILE__)) . '/');

date_default_timezone_set('UTC');

require ROOTPATH . 'includes/config.inc.php';
require ROOTPATH . 'includes/classes/databaseManager.class.php';
require ROOTPATH . 'includes/classes/inputManager.class.php';
require ROOTPATH . 'includes/classes/siteManager.class.php';
require ROOTPATH . 'includes/classes/vcashrpc.class.php';
require ROOTPATH . 'includes/plugins/vendor/autoload.php';
require ROOTPATH . 'includes/plugins/template.inc.php';

$db = new databaseManager($config['database']);
$input = new inputManager;
$site = new siteManager($db);
$xvc = new vCashRPC;
