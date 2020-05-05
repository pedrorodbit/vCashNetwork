<?php

class siteManager {

  public function __construct($db) {
    $this->db = $db;
  }

  public function getPeerInfo() {
    $getPeerInfo = $this->db->Query('SELECT * FROM `peers`');
    return $getPeerInfo->resultSet(PDO::FETCH_ASSOC);
  }

  public function peerExists(string $ip) {
    $nodeExists = $this->db->Query('SELECT `id` FROM `peers` WHERE `ip` = :ip LIMIT 1');
    $nodeExists->Bind(':ip', $ip, PDO::PARAM_STR);
    return (bool) $nodeExists->Evaluate(0);
  }

  public function addPeer(array $data) {
    $addNode = $this->db->Query('INSERT INTO `peers` (ip, port, services, lastsend, lastrecv, conntime, version, subver, inbound, releasetime, startingheight, banscore) VALUES (:ip, :port, :services, :lastsend, :lastrecv, :conntime, :version, :subver, :inbound, :releasetime, :startingheight, :banscore);');
    $addNode->Bind(':ip', $data['ip'], PDO::PARAM_STR);
    $addNode->Bind(':port', $data['port'], PDO::PARAM_INT);
    $addNode->Bind(':services', $data['services'], PDO::PARAM_INT);
    $addNode->Bind(':lastsend', $data['lastsend'], PDO::PARAM_INT);
    $addNode->Bind(':lastrecv', $data['lastrecv'], PDO::PARAM_INT);
    $addNode->Bind(':conntime', $data['conntime'], PDO::PARAM_INT);
    $addNode->Bind(':version', $data['version'], PDO::PARAM_INT);
    $addNode->Bind(':subver', $data['subver'], PDO::PARAM_STR);
    $addNode->Bind(':inbound', $data['inbound'], PDO::PARAM_STR);
    $addNode->Bind(':releasetime', $data['releasetime'], PDO::PARAM_INT);
    $addNode->Bind(':startingheight', $data['startingheight'], PDO::PARAM_INT);
    $addNode->Bind(':banscore', $data['banscore'], PDO::PARAM_INT);
    $addNode->Execute();
  }

  public function updatePeer(array $data) {
    $updatePeer = $this->db->Query('UPDATE `peers` SET `port` = :port, `services` = :services, `lastsend` = :lastsend, `lastrecv` = :lastrecv, `conntime` = :conntime, `version` = :version, `subver` = :subver, `inbound` = :inbound, `releasetime` = :releasetime, `startingheight` = :startingheight, `banscore` = :banscore WHERE `ip` = :ip;');
    $updatePeer->Bind(':ip', $data['ip'], PDO::PARAM_STR);
    $updatePeer->Bind(':port', $data['port'], PDO::PARAM_INT);
    $updatePeer->Bind(':services', $data['services'], PDO::PARAM_INT);
    $updatePeer->Bind(':lastsend', $data['lastsend'], PDO::PARAM_INT);
    $updatePeer->Bind(':lastrecv', $data['lastrecv'], PDO::PARAM_INT);
    $updatePeer->Bind(':conntime', $data['conntime'], PDO::PARAM_INT);
    $updatePeer->Bind(':version', $data['version'], PDO::PARAM_INT);
    $updatePeer->Bind(':subver', $data['subver'], PDO::PARAM_STR);
    $updatePeer->Bind(':inbound', $data['inbound'], PDO::PARAM_STR);
    $updatePeer->Bind(':releasetime', $data['releasetime'], PDO::PARAM_INT);
    $updatePeer->Bind(':startingheight', $data['startingheight'], PDO::PARAM_INT);
    $updatePeer->Bind(':banscore', $data['banscore'], PDO::PARAM_INT);
    $updatePeer->Execute();
  }

}
