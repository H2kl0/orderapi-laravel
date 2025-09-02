<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TechnicianController extends Controller
{
    private $rules = [
        'document' => 'required|integer|max:99999999999999999999|min:1',
        'name' => 'required|string|max:80|min:3',
        'especiality' => 'string|max:50|min:3',
        'phone' => 'string|max:30'
    ];

    private $traductionAttributes = [
        'document' => 'documento',
        'name' => 'nombre',
        'especiality' => 'especialidad',
        'phone' => 'teléfono'
    ];




    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technicians = Technician::all();   
        return response()->json($technicians, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $technician = Technician::create($request->all());
        $response = [
            'message' => 'Registro creado exitosamente',
            'technician'  => $technician
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technician $technician)
    {
        return response()->json($technician, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technician $technician)
    {


        $technician->update($request->all());
        $data = [
            'message' => 'Registro actualizado exitosamente',
            'technician'  => $technician
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technician $technician)
    {
        $technician->delete();
        $data = [
            'message' => 'Registro eliminado exitosamente',
            'technician'  => $technician->id
        ];

        return response()->json($data, Response::HTTP_OK);
    }
}