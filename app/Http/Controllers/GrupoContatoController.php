<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\GrupoContato;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Editor\Fields\Select;

class GrupoContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');

        return view('grupo_contato.index', compact('mensagem'));
    }

    public function datatable(DataTables $dataTables)
    {
        $query = GrupoContato::query()
            ->withCount('contatos');

        return $dataTables->eloquent($query)
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contatos = Contato::query()
            ->select('id', 'nome')
            ->get();

        return view('grupo_contato.create', compact('contatos'));
    }

    public function create_select()
    {
        $contatos = Contato::query()
            ->select('id', 'nome')
            ->get();

        return view('grupo_contato.create-select2', compact('contatos'));
    }

    public function select_grupo()
    {
        $dados = Contato::query()
            ->select('nome')
            ->get();

        return $dados;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'min:2', 'max:255'],
            'descricao' =>['max:255'],
            'contatos' => ['required'],
        ]);

        $grupo = GrupoContato::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        $grupo->contatos()->sync($request->contatos);

        $request->session()->flash(
            'mensagem',
            "Grupo $grupo->nome criado com sucesso."
        );

        return redirect(route('grupo_contato.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrupoContato  $grupoContato
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoContato $grupoContato)
    {
        $grupoContato->load('contatos');

        return view('grupo_contato.show', compact('grupoContato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GrupoContato  $grupoContato
     * @return \Illuminate\Http\Response
     */
    public function edit(GrupoContato $grupoContato)
    {
        $grupoContato->load('contatos');
        
        $contatos = Contato::pluck('nome', 'id');
        
        return view('grupo_contato.edit', compact('grupoContato', 'contatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrupoContato  $grupoContato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoContato $grupoContato)
    {

        $request->validate([
            'nome' => ['required', 'min:2', 'max:255'],
            'descricao' => ['max:255'],
            'contatos' => ['required'],
        ]);

        $grupoContato->contatos()->sync($request->contatos);
        
        $grupoContato->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        

        return redirect()->route('grupo_contato.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrupoContato  $grupoContato
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrupoContato $grupoContato, Request $request)
    {
        $grupoContato->delete();

        $request->session()->flash(
            'mensagem',
            "Grupo $grupoContato->nome foi removido com sucesso."
        );

        return redirect()->route('grupo_contato.index');
    }
}
