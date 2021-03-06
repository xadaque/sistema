<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Http\Requests\Manager\ModuleRequest;

class ModuleController extends Controller
{
	/**
	 * @var Module
	 */
	private $module;

	public function __construct(Module $module)
	{
		$this->module = $module;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$modules = $this->module->paginate(10);

		return view('manager.modules.index', compact('modules'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('manager.modules.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ModuleRequest $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(ModuleRequest $request)
	{

			$this->module->create($request->all());


            $request->session()->flash('sucesso',"$request->name criado com sucesso!");
			return redirect()->route('modules.index');


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return redirect()->route('modules.edit', $id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @param Resource $resource
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$module = $this->module->find($id);

		return view('manager.modules.edit', compact('module'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param ModuleRequest $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(ModuleRequest $request, $id)
	{
		try {
			$module = $this->module->find($id);
			$module->update($request->all());

            $request->session()->flash('sucesso',"$request->name atualizado com sucesso!");
			return redirect()->route('modules.index');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualiza????o...';

			flash($message)->error();
			return redirect()->back();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		try {
			$module = $this->module->find($id);
			$module->delete();

            $request->session()->flash('sucesso',"$request->name removido com sucesso!");
			return redirect()->route('modules.index');

		}catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar remo????o...';

			flash($message)->error();
			return redirect()->back();
		}
	}

	public function syncResources(Module $module, Resource $resource)
	{
		$resources = $resource->whereNull('module_id')
		                     ->where('is_menu', true)
		                     ->get();

		return view('manager.modules.sync-resources', compact('module', 'resources'));
	}

	public function updateSyncResources(Module $module, Request $request, Resource $resource)
	{
		try{
			foreach($request->resources as $r) {
				$resourceModel = $resource->find($r);
				$resourceModel->module()->associate($module);
                dd($resourceModel);
				$resourceModel->save();
			}

            $request->session()->flash('sucesso',"$request->name adicionados para o m??dulo!");

			return redirect()->back();
		} catch (\Exception $e) {
			$message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar adi????o de recursos para o m??dulo...';

			$request->session()->flash('sucesso',"$request->name adicionados para o m??dulo!");
			return redirect()->back();
		}
	}
}
