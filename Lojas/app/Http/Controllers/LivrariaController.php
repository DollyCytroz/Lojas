<?php

namespace App\Http\Controllers;

use App\Models\Livraria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LivrariaController extends Controller
{
    /**
     * Exibe uma lista de todas as livrarias.
     */
    public function index()
    {
        $registros = Livraria::all();

        return response()->json($registros);
    }

    /**
     * Armazena uma nova livraria no banco de dados.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome_livraria' => 'required',
            'setor' => 'required',
            'funcionarios_livraria' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $registro = Livraria::create($request->all());

        if ($registro) {
            return response()->json([
                'success' => true,
                'message' => 'Livraria cadastrada com sucesso!',
                'data' => $registro
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao cadastrar a livraria'
        ], 500);
    }

    /**
     * Exibe uma livraria específica.
     */
    public function show($id)
    {
        $registro = Livraria::find($id);

        if ($registro) {
            return response()->json([
                'success' => true,
                'message' => 'Livraria localizada com sucesso!',
                'data' => $registro
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Livraria não localizada.'
        ], 404);
    }

    /**
     * Atualiza os dados de uma livraria existente.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nome_livraria' => 'required',
            'setor' => 'required',
            'funcionarios_livraria' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $registro = Livraria::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Livraria não encontrada'
            ], 404);
        }

        $registro->nome_livraria = $request->nome_livraria;
        $registro->setor = $request->setor;
        $registro->funcionarios_livraria = $request->funcionarios_livraria;

        if ($registro->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Livraria atualizada com sucesso!',
                'data' => $registro
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao atualizar a livraria'
        ], 500);
    }

    /**
     * Remove uma livraria do banco de dados.
     */
    public function destroy($id)
    {
        $registro = Livraria::find($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Livraria não encontrada'
            ], 404);
        }

        if ($registro->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Livraria deletada com sucesso'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao deletar a livraria'
        ], 500);
    }
}
