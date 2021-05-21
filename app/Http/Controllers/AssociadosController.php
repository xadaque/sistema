<?php

namespace App\Http\Controllers;

use App\Models\SubGrupos;
use App\Models\Associados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AssociadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $associados=DB::connection('sqlsrv')->table('Associados')
                                ->join('SubGrupos', 'Associados.SubGrupo', '=', 'SubGrupos.SubGrupo')
                                ->leftJoin('Status','Associados.Status', '=', 'Status.Codigo')
                                ->select('Associados.Inscricao','Associados.Nome','Associados.SubGrupo','Associados.Cobranca','Status.Descricao as Status',
                                 'SubGrupos.Descricao')
                                ->orderBy('Associados.Nome')->paginate(25);

        return view('pages.associados.index',compact('associados'));
    }
    public function search(Request $request)
    {//->orWhere('nomeLaboratorio','LIKE',"%{$request->endereco->search}%")
        $filters=$request->except('_token');

        $associados=DB::connection('sqlsrv')->table('Associados')
                                            ->join('SubGrupos', 'Associados.SubGrupo', '=', 'SubGrupos.SubGrupo')
                                            ->leftJoin('Status','Associados.Status', '=', 'Status.Codigo')
                                            ->select('Associados.Inscricao','Associados.Nome','Associados.SubGrupo','Associados.Cobranca','Status.Descricao as Status',
                                            'SubGrupos.Descricao')
                                            ->where('NOME','LIKE',"%{$request->search}%")
                                           //->orWhere('Inscricao','=',"{$request->search}")
                                            ->paginate();
        //dd($lab);
        return view('pages.associados.index',compact('associados','filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Associados  $associados
     * @return \Illuminate\Http\Response
     */
    public function show($inscricao)
    {
        if(!$associados= Associados::find($inscricao))
        {
            return redirect()->route('pages.associados.index');
        }

        return view('pages.associados.show', compact('associados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Associados  $associados
     * @return \Illuminate\Http\Response
     */
    public function edit(Associados $associados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Associados  $associados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Associados $associados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Associados  $associados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Associados $associados)
    {
        //
    }
}
