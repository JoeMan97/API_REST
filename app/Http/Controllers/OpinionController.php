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
            ->select('opinions.*',
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
            return response()->json([
                "mesage" => "Opinión creada correctamente.",
                "opinion" => $opinion
            ], 201); // 201: Created

        }
    }

    /**
     * Muestra las opiniones del usuario que hace la peticion
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        return response()->json(DB::table('opinions')
            ->where('user_id', '=', $user_id)
            ->get(), 200); // 200: OK
    }

}
