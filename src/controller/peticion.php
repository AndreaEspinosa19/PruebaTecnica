<?php

require '../../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
$url = 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php';


$request = new Request('GET', $url . '?operation=getchallenge&username=prueba');
$res = $client->sendAsync($request)->wait();
$resultado = $res->getBody();

$array = json_decode($resultado, true);
$token = $array["result"]["token"];


if ($token != NULL) {

    $headers2 = [
        'Content-Type' => 'application/x-www-form-urlencoded'
    ];

    $data = [
        'form_params' => [
            'operation' => 'login',
            'username' => 'prueba',
            'accessKey' => md5($token . 'NjgqBSndcSfOSM9w'),
        ]
    ];

    $request2 = new Request('POST', $url, $headers2);
    $res2 = $client->sendAsync($request2, $data)->wait();
    $resultado2 = $res2->getBody();

    $array = json_decode($resultado2, true);
    $sessionName = $array["result"]["sessionName"];


    if ($sessionName != NULL) {

        $request3 = new Request('GET', $url . '?operation=query&sessionName=' . $sessionName . '&query=select * from Contacts;');
        $res3 = $client->sendAsync($request3)->wait();
        $respuesta3 = $res3->getBody();
        echo ($respuesta3);
    }
}
