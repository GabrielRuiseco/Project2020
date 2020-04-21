<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;

class RequestController extends Controller
{
    public function getUsr(){
        return User::all();
    }

    public function selmix1(Request $request)
    {
        $client = new Client(self::guzzleClient());
        $promise = $client->requestAsync('POST', 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.mix1feed/data', [
            'headers' => [
                'Authorization' => 'Bearer YjLbmdxz35TEwZAuIoItSakCkNBle9GpPpoU4vgQH3EL6S0sYzkIk6TaXwb2',
                'X-AIO-Key' => 'aio_iKmy47YN8W3gH0VGo6NIICkBy63A'
            ],
            'form_params' => [
                'datum' => ['value' => '1'],
            ]
        ]);
        $promise->then(
            function (Response $response) {
                return $response;
                echo $response->getBody();
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );
        $promise->wait();
    }

    public function selmix2(Request $request)
    {
        $client = new Client(self::guzzleClient());
        $promise = $client->requestAsync('POST', 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.mix2feed/data', [
            'headers' => [
                'Authorization' => 'Bearer YjLbmdxz35TEwZAuIoItSakCkNBle9GpPpoU4vgQH3EL6S0sYzkIk6TaXwb2',
                'X-AIO-Key' => 'aio_iKmy47YN8W3gH0VGo6NIICkBy63A'
            ],
            'form_params' => [
                'datum' => ['value' => '1'],
            ]
        ]);
        $promise->then(
            function (Response $response) {
                return $response;
                echo $response->getBody();
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );

        $promise->wait();

    }

    public static function selmix3(Request $request)
    {
        $client = new Client(self::guzzleClient());
        $promise = $client->requestAsync('POST', 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.mix3feed/data', [
            'headers' => [
                'Authorization' => 'Bearer YjLbmdxz35TEwZAuIoItSakCkNBle9GpPpoU4vgQH3EL6S0sYzkIk6TaXwb2',
                'X-AIO-Key' => 'aio_iKmy47YN8W3gH0VGo6NIICkBy63A'
            ],
            'form_params' => [
                'datum' => ['value' => '1'],
            ]
        ]);
        $promise->then(
            function (Response $response) {
                return $response;
                echo $response->getBody();
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );
        $promise->wait();
    }

    public static function resetfeeds(Request $request)
    {
        $client = new Client(self::guzzleClient());
        $promise1 = $client->requestAsync('POST', 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.mix1feed/data', [
            'headers' => [
                'Authorization' => 'Bearer YjLbmdxz35TEwZAuIoItSakCkNBle9GpPpoU4vgQH3EL6S0sYzkIk6TaXwb2',
                'X-AIO-Key' => 'aio_iKmy47YN8W3gH0VGo6NIICkBy63A'
            ],
            'form_params' => [
                'datum' => ['value' => '0'],
            ]
        ]);

        $promise2 = $client->requestAsync('POST', 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.mix2feed/data', [
            'headers' => [
                'Authorization' => 'Bearer YjLbmdxz35TEwZAuIoItSakCkNBle9GpPpoU4vgQH3EL6S0sYzkIk6TaXwb2',
                'X-AIO-Key' => 'aio_iKmy47YN8W3gH0VGo6NIICkBy63A'
            ],
            'form_params' => [
                'datum' => ['value' => '0'],
            ]
        ]);

        $promise3 = $client->requestAsync('POST', 'https://io.adafruit.com/api/v2/gabriel_rc/feeds/project.mix3feed/data', [
            'headers' => [
                'Authorization' => 'Bearer YjLbmdxz35TEwZAuIoItSakCkNBle9GpPpoU4vgQH3EL6S0sYzkIk6TaXwb2',
                'X-AIO-Key' => 'aio_iKmy47YN8W3gH0VGo6NIICkBy63A'
            ],
            'form_params' => [
                'datum' => ['value' => '0'],
            ]
        ]);

        $promise1->then(
            function (Response $response) {
                return $response;
                echo $response->getBody();
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );

        $promise2->then(
            function (Response $response) {
                return $response;
                echo $response->getBody();
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );

        $promise3->then(
            function (Response $response) {
                return $response;
                echo $response->getBody();
            },
            function (RequestException $e) {
                echo $e->getMessage();
            }
        );

        $promise1->wait();
        $promise2->wait();
        $promise3->wait();
    }



    private static function guzzleClient()
    {
        return [
            'base_url' => 'https://io.adafruit.com/api/v2/'
        ];
    }
}
