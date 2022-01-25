<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Contato $contato, Telefone $telefone)
    {
        return view('contato.telefone.create', compact('contato', 'telefone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Contato $contato, Telefone $telefone, Request $request)
    {
        $request->validate([
            'telefone' => ['required', 'min:9', 'max:17'],
            'descricao_telefone' => ['max:255']
        ]);

        $contato->telefones()->create([
            'numero' => $request->telefone,
            'descricao' => $request->descricao_telefone
        ]);

        
        $request->session()->flash(
            'mensagem',
            "Telefone criado com sucesso."
        );

        return redirect()->route('contato.show', compact('contato'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function show(Telefone $telefone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato, Telefone $telefone)
    {
        return view('contato.telefone.edit', compact('contato', 'telefone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato, Telefone $telefone)
    {
        
        $request->validate([
            'telefone' => ['required', 'min:9', 'max:17'],
            'descricao_telefone' => ['max:255']
        ]);
        
        $telefone->update([
            'numero' => $request->telefone,
            'descricao' => $request->descricao_telefone
        ]);

        $request->session()->flash(
            'mensagem',
            "Telefone atualizado com sucesso."
        );

        return redirect()->route('contato.show', compact('contato'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Telefone  $telefone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato, Telefone $telefone, Request $request)
    {
        $telefone->delete();

        $request->session()->flash(
            'mensagem',
            "Telefone removido com sucesso."
        );
        return redirect()->back();
    }
}
