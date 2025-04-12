<?php

namespace App\Http\Controllers;

use App\Models\Perfumaria;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class PerfumariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Perfumaria::all();
        $contador = $registros->count();

        return Response()->json($registros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $validator = Validator::make($request->all(), [
              'nome_perfumaria' => 'required',
              'setor_perfumaria' => 'required',
              'funcionarios_perfumaria'=> 'required'
            ]);
      
            if($validator->fails()) {
              return response()->json([
                  'success' => false,
                  'message' => 'Registros inválidos',
                  'errors' => $validator->errors()
              ], 400);
            }
      
            $registros = Perfumaria::create($request->all());
      
            if($registros) {
              return response()->json([
                  'success' => true,
                  'message' => 'Perfumaria cadastrada com sucesso!',
                  'data' => $registros
              ], 201);
            } else {
              return response()->json([
                  'success' => false,
                  'message' => 'Erro ao cadastrar a perfumaria'
              ], 500);
            }
          }
      
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $registros = Perfumaria::find($id);

        if($registros){
            return response()->json([
                'success' => true,
                'message' => 'Perfumaria localizada com sucesso!',
                'data' => $registros
            ], 200);   
        } else{
            return response()->json([
                'success' => false,
                'message' => 'Perfumaria não localizada.',
            ], 404);
        }
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nome_perfumaria' => 'required',
            'setor_perfumaria' => 'required',
            'funcionarios_perfumaria' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $registrosBanco = Perfumaria::find($id);

        if (!$registrosBanco) {
            return response()->json([
                'success' => false,
                'message' => 'Perfumaria não encontrada'
            ], 404);
        }

        $registrosBanco->nome_perfumaria = $request->nome_perfumaria;
        $registrosBanco->setor_perfumaria = $request->setor_perfumaria;
        $registrosBanco->funcionarios_perfumaria = $request->funcionarios_perfumaria;

        if ($registrosBanco->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Perfumaria atualizada com sucesso!',
                'data' => $registrosBanco
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar a perfumaria'
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registros = Perfumaria::find($id);

        if(!$registros) {
            return response()->json([
                'success' => false,
                'message' => 'Perfumaria não encontrada'
            ], 404);
        }

        if ($registros->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Perfumaria deletada com sucesso'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao deletar a perfumaria'
        ], 500);
    }

}