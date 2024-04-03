<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Validator;
use Exception;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = cliente::orderBy('id', 'desc')->paginate(10);
        return view("pages.clientes.index", compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->merge([
                'cnpj' => preg_replace('/[^0-9]/', '', $request->input('cnpj'))
            ]);

            $validator = Validator::make($request->all(), [
                'razaoSocial' => 'required|string|max:255',
                'cnpj' => 'required|string|size:14|unique:cliente',
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

            cliente::create($request->all());
            return redirect()->route("clientes")->with("success", "Cadastrado com Sucesso!");
        } catch (\Throwable $th) {
            return redirect()->route("clientes.create")->with("error", $th->getMessage())->withInput($request->input());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = cliente::findOrFail($id);
        return view("pages.clientes.edit", compact("cliente"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->merge([
                'cnpj' => preg_replace('/[^0-9]/', '', $request->input('cnpj'))
            ]);

            $validator = Validator::make($request->all(), [
                'razaoSocial' => 'required|string|max:255',
                'cnpj' => 'required|string|size:14|unique:cliente,cnpj,' . $id,
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

            $cliente = cliente::findOrFail($id);
            $cliente->update($request->all());
            return redirect()->route("clientes")->with("success", "Atualizado com Sucesso!");
        } catch (\Throwable $th) {
            return redirect()->route("clientes.edit", $id)->with("error", $th->getMessage())->withInput();
        }
    }


    /**
     * Delete the specified resource in storage.
     */
    public function delete($id)
    {
        $cliente = cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route("clientes")->with("success", "Excluido com Sucesso!");
    }
}
