<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Cliente;
use App\Models\Selecao;
use Illuminate\Http\Request;
use Validator;
use Exception;

class SelecaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $selecoes = Selecao::orderBy('id', 'desc')->paginate(10);
        return view("pages.selecao.index", compact("selecoes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::orderBy('id', 'desc')->get();
        $candidatos = Candidato::orderBy('id', 'desc')->get();
        return view("pages.selecao.create", compact('clientes', 'candidatos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'cliente' => ['required', 'exists:cliente,id'],
                'candidato' => ['required', 'exists:candidatos,id'],
            ], [
                'required' => 'O campo :attribute é obrigatório.',
                'string' => 'O conteúdo do campo :attribute deve ser uma string.',
                'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            Selecao::create([
                'nome' => $request['nome'],
                'fk_clienteId' => $request['cliente'],
                'fk_candidatoId' => $request['candidato'],
            ]);
            return redirect()->route("selecao")->with("success", "Cadastrado com Sucesso!");
        } catch (\Throwable $th) {
            return redirect()->route("selecao.create")->with("error", $th->getMessage())->withInput($request->input());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $selecao = Selecao::findOrFail($id);
        $clientes = Cliente::orderBy('id', 'desc')->get();
        $candidatos = Candidato::orderBy('id', 'desc')->get();
        return view("pages.selecao.edit", compact('selecao','clientes','candidatos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'cliente' => ['required', 'exists:cliente,id'],
                'candidato' => ['required', 'exists:candidatos,id'],
            ], [
                'required' => 'O campo :attribute é obrigatório.',
                'string' => 'O conteúdo do campo :attribute deve ser uma string.',
                'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $selecao = Selecao::findOrFail($id);
            $selecao->update([
                'nome' => $request['nome'],
                'fk_clienteId' => $request['cliente'],
                'fk_candidatoId' => $request['candidato'],
            ]);
            return redirect()->route("selecao")->with("success", "Cadastrado com Sucesso!");
        } catch (\Throwable $th) {
            return redirect()->route("selecao.create")->with("error", $th->getMessage())->withInput($request->input());
        }
    }


    /**
     * Delete the specified resource in storage.
     */
    public function delete($id)
    {
        $selecao = Selecao::findOrFail($id);
        $selecao->delete();
        return redirect()->route("selecao")->with("success", "Excluido com Sucesso!");
    }
}
