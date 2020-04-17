<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Obtiene el id de usuario y su token para poder manipular los recursos de la API
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user_id = $request->user()->user_id;

        $query = DB::table('users')
        ->where('user_id', $user_id)
        ->pluck('api_token');

        $api_token = $query[0];

        // retorna la vista y esos 2 parametros
        return view('opinions.index', [ 
            'user_id' => $user_id,
            'api_token' => $api_token
        ]);
    }

}
