<?php

try {
  $result = $xvc->getpeerinfo();

  $peers = $result['result'];
} catch (\Exception $e) {
  echo $e->getMessage();
}

if (!isset($peers)) {
  return;
}

for ($i=0; $i < count($peers); $i++) {
  $address = explode(':', $peers[$i]['addr']);

  $data = [
    'ip' => $address[0],
    'port' => $address[1],
    'services' => $peers[$i]['services'],
    'lastsend' => $peers[$i]['lastsend'],
    'lastrecv' => $peers[$i]['lastrecv'],
    'conntime' => $peers[$i]['conntime'],
    'version' => $peers[$i]['version'],
    'subver' => $peers[$i]['subver'],
    'inbound' => $peers[$i]['inbound'] ? '1' : '0',
    'releasetime' => $peers[$i]['releasetime'],
    'startingheight' => $peers[$i]['startingheight'],
    'banscore' => $peers[$i]['banscore']
  ];

  if ($site->peerExists($data['ip'])) {
    $site->updatePeer($data);
  } else {
    $site->addPeer($data);
  }
}
