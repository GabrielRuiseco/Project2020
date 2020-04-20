<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TokensController extends Controller
{
    //
    public function updateApiToken(Request $request)
    {
        $token = Str::random(60);

        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return ['token' => $token];
    }

    public function updateadafruit(Request $request)
    {
        $token = $request->adafruit_key;

        $request->user()->forceFill([
            'adafruit_key' => $token,
        ])->save();

        return ['token' => $token];
    }

    public function getApiToken(Request $request)
    {
        return $request->user()->getApiToken();
    }

    public function getadafruitkey(Request $request)
    {
        return $request->user()->getadafruitkey();
    }
}
