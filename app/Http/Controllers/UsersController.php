<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;

class UsersController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * UsersController constructor.
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create', ['user' => $this->user]);
    }

    public function store(UserFormRequest $request)
    {
        $dataUser = $request->all();

        $dataUser['password'] = bcrypt($dataUser['password']);

        $dataForm = $this->user->create($dataUser);

        if($dataForm){
            return redirect()
                ->route('users.index')
                ->with(['success' => 'Usuário cadastrado com sucesso!']);
        }else{
            return redirect()
                ->route('categories.create')
                ->withErrors(['errors' => 'Falha ao cadastrar!'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserFormRequest $request, $id)
    {
        $dataUser = $request->all();

        $user = $this->user->find($id);

        $dataUser['password'] = bcrypt($dataUser['password']);

        $update = $user->update($dataUser);

        if($update){
            return redirect()
                ->route('users.index')
                ->with(['success' => 'Usuário cadastrado com sucesso!']);
        }else{
            return redirect()
                ->route('users.create')
                ->withErrors(['errors' => 'Falha ao cadastrar!'])
                ->withInput();
        }
    }

    public function show($id)
    {
        $user = $this->user->find($id);
        return view('users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->delete();
        return redirect()->to('/users');
    }
}
