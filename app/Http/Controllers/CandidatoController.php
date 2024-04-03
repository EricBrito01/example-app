<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use Validator;
use Exception;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidatos = Candidato::orderBy('id', 'desc')->paginate(10);
        return view("pages.candidatos.index", compact("candidatos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.candidatos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->merge([
                'cpf' => preg_replace('/[^0-9]/', '', $request->input('cpf'))
            ]);

            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'cpf' => 'required|string|size:11|unique:candidatos',
                'logradouro' => 'required|string|max:255',
            ], [
                'required' => 'O campo :attribute é obrigatório.',
                'string' => 'O conteúdo do campo :attribute deve ser uma string.',
                'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
                'size' => 'O campo :attribute deve ter :size caracteres.',
                'unique' => 'O conteúdo do campo :attribute já foi cadastrado.',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            Candidato::create($request->all());
            return redirect()->route("candidatos")->with("success", "Cadastrado com Sucesso!");
        } catch (\Throwable $th) {
            return redirect()->route("candidatos.create")->with("error", $th->getMessage())->withInput($request->input());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $candidato = Candidato::findOrFail($id);
        return view("pages.candidatos.edit", compact("candidato"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->merge([
                'cpf' => preg_replace('/[^0-9]/', '', $request->input('cpf'))
            ]);

            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'cpf' => 'required|string|size:11|unique:candidatos,cpf,' . $id,
                'logradouro' => 'required|string|max:255',
            ], [
                'required' => 'O campo :attribute é obrigatório.',
                'string' => 'O conteúdo do campo :attribute deve ser uma string.',
                'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
                'size' => 'O campo :attribute deve ter :size caracteres.',
                'unique' => 'O conteúdo do campo :attribute já foi cadastrado.',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $candidato = Candidato::findOrFail($id);
            $candidato->update($request->all());
            return redirect()->route("candidatos")->with("success", "Atualizado com Sucesso!");
        } catch (\Throwable $th) {
            return redirect()->route("candidatos.edit", $id)->with("error", $th->getMessage())->withInput();
        }
    }


    /**
     * Delete the specified resource in storage.
     */
    public function delete($id)
    {
        $candidato = Candidato::findOrFail($id);
        $candidato->delete();
        return redirect()->route("candidatos")->with("success", "Excluido com Sucesso!");
    }
}
