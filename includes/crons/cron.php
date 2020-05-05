<?php
$scriptStart = microtime(true);

require '../bootstrap.inc.php';
/*
$secret = $input->g['secret'] ?? null;

if ($secret != '1') {
  http_response_code(403);
  exit;
}
*/
ini_set('memory_limit', -1);
set_time_limit(0);

require 'peers.inc.php';

$scriptEnd = microtime(true);

$execTime = number_format($scriptEnd - $scriptStart, 4);

echo 'Finished: total execution time: ' . $execTime . ' secs!';
