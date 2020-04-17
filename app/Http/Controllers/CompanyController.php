<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

use Validator;

class CompanyController extends Controller
{
    /**
     * Muestra todas las compañias que hay en la BD
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Company::get(), 200); // 200: OK
    }

    /**
     * Almacena una compañia
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validaciones a los campos
        $rules = [
            'name' => 'required|max: 25',
            'address' => 'required|max: 100',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 422); // 422: Unprocessable Entity
        }

        // guarda
        $company = Company::create($request->all());

        // y retorna la compañia en formato json
        return response()->json($company, 201); // 201: Created
    }
}
