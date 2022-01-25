<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Endereco;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class EnderecoController extends Controller
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
    public function create(Contato $contato, Endereco $endereco)
    {
        return view('contato.endereco.create', compact('contato', 'endereco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Contato $contato, Endereco $endereco, Request $request)
    {
        $request->validate([
            'pais_endereco' => ['required', 'min:2', 'max:100'],
            'estado_endereco' => ['required', 'min:2', 'max:100'],
            'cidade_endereco' => ['required', 'min:2', 'max:100'],
            'bairro_endereco' => ['required', 'min:2', 'max:100'],
            'logradouro_endereco' => ['required', 'min:2', 'max:100'],
            'numero_endereco' => ['required', 'min:1', 'max:17'],
            'cep_endereco' => ['required', 'min:8', 'max:9'],
            'descricao_endereco' =>['max:255']
        ]);
        
        $contato->enderecos()->create([
            'pais' => $request->pais_endereco,
            'estado' => $request->estado_endereco,
            'cidade' => $request->cidade_endereco,
            'bairro' => $request->bairro_endereco,
            'logradouro' => $request->logradouro_endereco,
            'numero' => $request->numero_endereco,
            'cep' => $request->cep_endereco,
            'descricao' => $request->descricao_endereco
        ]);

        return redirect()->route('contato.show', $contato);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Endereco $endereco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato, Endereco $endereco)
    {
        return view('contato.endereco.edit', compact('contato', 'endereco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato, Endereco $endereco)
    {
        $request->validate([
            'pais_endereco' => ['required', 'min:2', 'max:100'],
            'estado_endereco' => ['required', 'min:2', 'max:100'],
            'cidade_endereco' => ['required', 'min:2', 'max:100'],
            'bairro_endereco' => ['required', 'min:2', 'max:100'],
            'logradouro_endereco' => ['required', 'min:2', 'max:100'],
            'numero_endereco' => ['required', 'min:1', 'max:17'],
            'cep_endereco' => ['required', 'min:8', 'max:9'],
            'descricao_endereco' =>['max:255']
        ]);
        
        $endereco->update([
            'pais' => $request->pais_endereco,
            'estado' => $request->estado_endereco,
            'cidade' => $request->cidade_endereco,
            'bairro' => $request->bairro_endereco,
            'logradouro' => $request->logradouro_endereco,
            'numero' => $request->numero_endereco,
            'cep' =>$request->cep_endereco,
            'descricao' => $request->descricao_endereco
        ]);
        return redirect()->route('contato.show', compact('contato'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato, Endereco $endereco)
    {
        $endereco->delete();
        return redirect()->back();
    }
}
