<?php
$page = [
  'name' => 'Home',
  'id' => 'home'
];

require 'global.inc.php';

$peers = $site->getPeerInfo();

$template->assign('peers', $peers);

$template->display('home.tpl');
