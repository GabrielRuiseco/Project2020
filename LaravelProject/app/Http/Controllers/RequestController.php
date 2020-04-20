<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;

class RequestController extends Controller
{
    public static function selmix1(Request $request)
    {
        $client = new Client(self::guzzleClient());
        $promise = $client->requestAsync('GET', 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.mix1feed/data',[
        'datum' => ['value' => 1],
        'headers' => [
            "X-AIO-Key" => "b780002b85d6411ca0ad9f9c60195f72"]
        ]);
        $promise->then(
            function (Response $response){
                return $response;
                echo $response->getBody();
            },
            function(RequestException $e){
                echo $e->getMessage();
            }
        );

        $promise->wait();

    }

    public static function selmix2(Request $request)
    {
        $client = new Client(self::guzzleClient());
        $promise = $client->requestAsync('GET', 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.mix2feed/data',[
            'datum' => ['value' => 1]
        ]);
        $promise->then(
            function (Response $response){
                return $response;
                echo $response->getBody();
            },
            function(RequestException $e){
                echo $e->getMessage();
            }
        );

        $promise->wait();

    }

    public static function selmix3(Request $request)
    {
        $client = new Client(self::guzzleClient());
        $promise = $client->requestAsync('GET', 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.mix3feed/data',[
            'datum' => ['value' => 1]
        ]);
        $promise->then(
            function (Response $response){
                return $response;
                echo $response->getBody();
            },
            function(RequestException $e){
                echo $e->getMessage();
            }
        );

        $promise->wait();

    }

    private static function guzzleClient()
    {
        return [
            'base_url' => 'https://io.adafruit.com/api/v2/'
        ];
    }
}
