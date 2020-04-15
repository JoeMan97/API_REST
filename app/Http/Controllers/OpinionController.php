<?php

namespace App\Http\Controllers;

use App\Opinion;
use Illuminate\Http\Request;

use Validator;

use App\Company;
use App\User;

use Illuminate\Support\Facades\DB;

class OpinionController extends Controller
{
    /**
     * Muestra las opiniones de todos los usuarios
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){}{
            $opinions = DB::table('opinions')
            ->join('users', 'opinions.user_id', '=', 'users.user_id')
            ->join('companies', 'opinions.company_id', '=', 'companies.company_id')
            ->select('opinions.opinion_id', 'opinions.score', 'opinions.title', 'opinions.resume', 'opinions.ip_address', 'opinions.created_at', 'opinions.company_id',
            'users.name as user_name', 'users.email',
            'companies.name as company_name', 'companies.address')
            ->get();
            return response()->json($opinions, 200); // 200: OK
        }
    }

    /**
     * Almacena una opinion
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){

            // validaciones a los campos
            $rules = [
                'score' => 'required|integer|between: 1,5',
                'title' => 'required|max: 64',
                'resume' => 'required|max: 10000',
                'ip_address' => 'required|ip',
                // la fecha no se pide porque se guarda automaticamente en el campo created_at
                'company_id' => 'required|integer',
                'user_id' => 'required|integer'
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return response()->json($validator->errors(), 422); // 422: Unprocessable Entity
            }

            // valida que exista el company_id y el user_id
            $company_id = $request->input('company_id');
            if(is_null(Company::find($company_id)))
                return response()->json('La compañía con el id ' . $company_id . ' no existe.');
            $user_id = $request->input('user_id');
            if(is_null(User::find($user_id)))
                return response()->json('El usuario con el id ' . $user_id . ' no existe.');
        
            // guarda la opinion
            $opinion = Opinion::create($request->all());

            // retorna la opinion completa en forma de json
            return $this->getByOpinionId($opinion->opinion_id);

        }
    }

    /**
     * Muestra las opiniones del usuario que hace la peticion
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function showByUserId(Request $request, $user_id)
    {
        if($request->ajax()){}{
            $opinions = DB::table('opinions')
            ->join('users', 'opinions.user_id', '=', 'users.user_id')
            ->join('companies', 'opinions.company_id', '=', 'companies.company_id')
            ->select('opinions.opinion_id', 'opinions.score', 'opinions.title', 'opinions.resume', 'opinions.ip_address', 'opinions.created_at', 'opinions.company_id',
            'users.name as user_name', 'users.email',
            'companies.name as company_name', 'companies.address')
            ->where('users.user_id', '=', $user_id)
            ->get();
            return response()->json($opinions, 200); // 200: OK
        }
    }

    /**
     * Para obtener una opinion en especifico en la funcion store
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    private function getByOpinionId($opinion_id)
    {
        $opinion = DB::table('opinions')
        ->join('users', 'opinions.user_id', '=', 'users.user_id')
        ->join('companies', 'opinions.company_id', '=', 'companies.company_id')
        ->select('opinions.opinion_id', 'opinions.score', 'opinions.title', 'opinions.resume', 'opinions.ip_address', 'opinions.created_at', 'opinions.company_id',
        'users.name as user_name', 'users.email',
        'companies.name as company_name', 'companies.address')
        ->where('opinion_id', '=', $opinion_id)
        ->get();

        return response()->json([
            "message" => "Opinión creada correctamente.",
            "opinion" => $opinion[0]
        ], 201); // 201: Created
    }
}
