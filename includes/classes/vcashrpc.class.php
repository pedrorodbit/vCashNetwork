<?php

class vCashRPC {

  private $username;
  private $password;
  private $host;
  private $port;

  private $id = 0;

  public function __construct($username = 'user', $password = null, $host = '127.0.0.1', $port = '9195') {
    $this->username = $username;
    $this->password = $password;
    $this->host = $host;
    $this->port = $port;
  }

  public function __call($method, $params = null) {
    $this->id++;

    $request = [
      'method' => strtolower($method),
      'params' => $params,
      'id' => $this->id
    ];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
    curl_setopt($curl, CURLOPT_USERPWD, $this->username. ':'. $this->password);
    curl_setopt($curl, CURLOPT_URL, $this->host . ':' . $this->port);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($request));
    $response_json = curl_exec($curl);
    curl_close($curl);

    if (!$response_json) {
      throw new Exception('Unable to connect to ' . $this->host, 0);
    }

    $response = json_decode($response_json, true);

    return $response;
  }

}
