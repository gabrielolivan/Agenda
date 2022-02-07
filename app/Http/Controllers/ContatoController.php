<?php

namespace App\Http\Controllers;

use App\DataTables\ContatoDataTable;
use App\Models\Contato;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contatos = Contato::query()
            ->withCount('enderecos', 'telefones')
            ->cursorPaginate(5);

        return view('contato.index', compact('contatos'));
    }

    public function index_beta(ContatoDataTable $dataTable)
    {
        return $dataTable->render('contato.index-beta');
    }


    // Estilo SV

    public function index_code()
    {
        return view('contato.index-code');
    }

    public function datatable(DataTables $dataTables)
    {
        $query = Contato::query()
            ->withCount('enderecos', 'telefones');

        return $dataTables->eloquent($query)
            ->make();
    }


    // fim do estilo SV


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nome = $request->validate([
            'nome' => ['required', 'min:2', 'max:100'],
            'email' => ['email', 'max:100'],
        ]);

        if(!empty($request->pais_endereco)){
            $request->validate([
                'pais_endereco' => ['required', 'max:100'],
                'estado_endereco' => ['required', 'max:100'],
                'cidade_endereco' => ['required', 'max:100'],
                'bairro_endereco' => ['required', 'max:100'],
                'logradouro_endereco' => ['required', 'max:100'],
                'numero_endereco' => ['required', 'max:17'],
                'cep_endereco' => ['required', 'max:9'],
                'descricao_endereco' =>['max:255'],
            ]);
        };

        if(!empty($request->telefone)){
            $request->validate([
                'telefone' => ['required', 'max:17'],
                'descricao_telefone' => ['max:255'],
            ]);
        };

        $contato = Contato::create($nome);

        if(!empty($request->telefone)){
            $contato->telefones()->create([
                'numero' => $request->telefone,
                'descricao' => $request->descricao_telefone
            ]);
        };

        if(!empty($request->pais_endereco)){
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
        };

        return redirect()->route('contato.index_code')->with([
            'mensagem' => "Contato $contato->nome foi criado com sucesso.",
            // 'erro' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato, Request $request)
    {
        $contato->load('enderecos', 'telefones');

        return view('contato.show', compact('contato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato)
    {
        $contato->load('enderecos', 'telefones');
        return view('contato.edit', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato)
    {
        $contato->load('enderecos', 'telefones');

        // Validação
        $nome = $request->validate([
            'nome' => ['required', 'min:2', 'max:100'],
            'email' => ['max:100']
        ]);

        foreach ($contato->enderecos as $endereco){
            $request->validate([
                "pais_endereco{$endereco->id}" => ['required', 'min:2', 'max:100'],
                "estado_endereco{$endereco->id}" => ['required', 'min:2', 'max:100'],
                "cidade_endereco{$endereco->id}" => ['required', 'min:2', 'max:100'],
                "bairro_endereco{$endereco->id}" => ['required', 'min:2', 'max:100'],
                "logradouro_endereco{$endereco->id}" => ['required', 'min:2', 'max:100'],
                "numero_endereco{$endereco->id}" => ['required', 'min:1', 'max:17'],
                "cep_endereco{$endereco->id}" => ['required', 'min:8', 'max:9'],
                "descricao_endereco{$endereco->id}" =>['max:255']
            ]);
        };

        foreach ($contato->telefones as $telefone){
            $request->validate([
                "telefone{$telefone->id}" => ['required', 'min:9', 'max:17'],
                "descricao_telefone{$telefone->id}" => ['max:255']
            ]);
        };

        // Update
        $contato->update($nome);

        foreach ($contato->enderecos as $endereco){
            $contato->enderecos->where('id', $endereco->id)->first()->update([
                'pais' => $request->input("pais_endereco{$endereco->id}"),
                'estado' => $request->input("estado_endereco{$endereco->id}"),
                'cidade' => $request->input("cidade_endereco{$endereco->id}"),
                'bairro' => $request->input("bairro_endereco{$endereco->id}"),
                'logradouro' => $request->input("logradouro_endereco{$endereco->id}"),
                'numero' => $request->input("numero_endereco{$endereco->id}"),
                'cep' =>$request->input("cep_endereco{$endereco->id}"),
                'descricao' => $request->input("descricao_endereco{$endereco->id}")
            ]);
        };

        foreach ($contato->telefones as $telefone)
            $contato->telefones->where('id', $telefone->id)->first()->update([
                'numero' => $request->input("telefone{$telefone->id}"),
                'descricao' => $request->input("descricao_telefone{$telefone->id}")
        ]);

        return redirect()->route('contato.show', $contato)->with([
            'mensagem' => "Contato $contato->nome foi atualizado com sucesso.",
            // 'erro' => true,
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato, Request $request)
    {
        $contato->delete();

        // return redirect()->back();
        return redirect()->route('contato.index_code')->with([
            'mensagem' => "Contato $contato->nome foi removido com sucesso.",
            // 'erro' => true,
        ]);
    }
}
