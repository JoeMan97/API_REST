<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Route;

class ApiTokenController extends Controller
{
    /**
    * Update the authenticated user's API token.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    public function update(Request $request)
    {
        $token = Str::random(80);

        $request->user()->forceFill([
            'api_token' => $token //hash('sha256', $token), 
        ])->save();

        // return ['token' => $token];
    }
}
