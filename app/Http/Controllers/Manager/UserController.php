<?php

namespace App\Http\Controllers\Manager;

use App\Models\Role;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Manager\UserRequest;

class UserController extends Controller
{
	/**
	 * @var User
	 */
	private $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = $this->user->paginate(10);

        return view('manager.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = Role::all('id', 'name');

        return view('manager.users.edit', compact('user', 'roles'));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param UserRequest $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function update(UserRequest $request, $id)
    {
        try{
        	$data = $request->all();

        	if($data['password']){

        		$validator = Validator::make($data, [
        			'password' => 'required|string|min:8|confirmed'
		        ]);

        		if($validator->fails())
        			return redirect()->back()->withErrors($validator);

				$data['password'] = bcrypt($data['password']);

	        } else {
        		unset($data['password']);
	        }

			$user = $this->user->find($id);
			$user->update($data);

			$role = Role::find($data['role']);
			$user = $user->role()->associate($role);
			$user->save();


            $request->session()->flash('sucesso',"$request->name 'Usuário atualizado com sucesso!'");
			return redirect()->route('users.index');

        }catch (\Exception $e) {
	        $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';

	        flash($message)->error();
	        return redirect()->back();
        }
    }
}
