<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Endereco;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

class LaboratorioController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $lab=Laboratorio::orderBy('nomeLaboratorio')->paginate(25);

        return view('pages.laboratorio.index',compact('lab'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.laboratorio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $endereco=Endereco::create($request->all());
        $endereco_id= $endereco->id;


        $laboratorio['endereco_id'] = $endereco_id;



        Laboratorio::create([
            'nomeLaboratorio' => request('nomeLaboratorio'),
            'telefone1Laboratorio' => request('telefone1Laboratorio'),
            'telefone2Laboratorio' => request('telefone2Laboratorio'),
            'active'=>request('parceiro'),
            'endereco_id' => $endereco_id,
            'cidade_id'=>$endereco_id
        ]);
        $request->session()->flash('sucesso',"$request->nomeLaboratorio incluído com sucesso!");
        return redirect()->route('laboratorio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$laboratorio=Laboratorio::where('id',$id)->first();

        if(!$laboratorio= Laboratorio::find($id))
        {
            return redirect()->route('pages.laboratorio.index');
        }

        return view('pages.laboratorio.show', compact('laboratorio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(!$laboratorio= Laboratorio::find($id))
        {
            return redirect()->route('pages.laboratorio.index');
        }
        return view('pages.laboratorio.edit', compact('laboratorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {
        // if(!$laboratorio= Laboratorio::find($id))
        // {
        //     return redirect()->route('pages.laboratorio.index');
        // }
        // $laboratorio->update($request->all());
        // $laboratorio->endereco->update($request->all());

        if(!$laboratorio= Laboratorio::find($id))
        {
            return redirect()->route('pages.laboratorio.index');
        }
        $laboratorio->update([
                'nomeLaboratorio' => request('nomeLaboratorio'),
                'telefone1Laboratorio' => request('telefone1Laboratorio'),
                'telefone2Laboratorio' => request('telefone2Laboratorio'),
                'active'=>request('parceiro'),
                'logradouro' => request('logradouro'),
                'cidade_id'=>request('cidade_id')
            ]);
        $laboratorio->endereco->update($request->all());

        // $laboratorioup=Laboratorio::find($id);
        // $laboratorioup->update([
        //     'nomeLaboratorio' => request('nomeLaboratorio'),
        //     'telefone1Laboratorio' => request('telefone1Laboratorio'),
        //     'telefone2Laboratorio' => request('telefone2Laboratorio'),
        //     'active'=>request('parceiro'),
        //     'logradouro' => request('logradouro'),
        //     'cidade_id'=>request('cidade_id')
        // ]);

        $request->session()->flash('sucesso',"$request->nomeLaboratorio atualizado com sucesso!");

        return redirect()->route('laboratorio.index');
    }

    public function search(Request $request)
    {//->orWhere('nomeLaboratorio','LIKE',"%{$request->endereco->search}%")
        $filters=$request->except('_token');

        $lab = Laboratorio::where('nomeLaboratorio','LIKE',"%{$request->search}%")->orderBy('nomeLaboratorio')->paginate(20);
        //dd($lab);
        return view('pages.laboratorio.index',compact('lab','filters'));
    }

    public function getEmployees(Request $request){

        $search = $request->search;

        if($search == ''){
           $employees = Cidade::orderby('nomeCidade','asc')->select('id','nomeCidade')->limit(6)->get();
        }else{
           $employees = Cidade::orderby('nomeCidade','asc')->select('id','nomeCidade')->where('nomeCidade', 'like', '%' .$search . '%')->limit(6)->get();
        }

        $response = array();
        foreach($employees as $employee){
           $response[] = array("value"=>$employee->id,"label"=>$employee->nomeCidade);
        }

        return response()->json($response);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
