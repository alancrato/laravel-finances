<?php

namespace App\Http\Controllers\Admin\Costs;

use App\Models\CategoryCosts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * @var CategoryCosts
     */
    private $categoryCosts;

    /**
     * CategoryController constructor.
     */
    public function __construct(CategoryCosts $categoryCosts)
    {
        $this->middleware('auth');
        $this->categoryCosts = $categoryCosts;
    }

    public function index()
    {
        $auth = Auth::user();
        $categories = $this->findByField('user_id', $auth['id']);
        return view('admin.costs.category.index', compact('categories'));

    }

    public function create()
    {
        return view('admin.costs.category.create', ['categories' => $this->categoryCosts]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $auth = Auth::user();

        $this->validate($request, $this->categoryCosts->rules());

        $dataForm = $request->all();

        $dataForm['user_id'] = $auth['id'];

        $data = $this->categoryCosts->create($dataForm);

        if($data){
            return redirect()
                ->route('categories.index')
                ->with(['success' => 'Categoria cadastrada com sucesso!']);
        }else{
            return redirect()
                ->route('categories.create')
                ->withErrors(['errors' => 'Falha ao cadastrar!'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $auth = Auth::user();
        $categories = $this->findOneBy([
            'id' => $id,
            'user_id' => $auth['id']
        ]);
        return view('admin.costs.category.edit', compact('categories'));

    }

    public function update(Request $request, $id)
    {
        $auth = Auth::user();

        $this->validate($request, $this->categoryCosts->rules($id));

        $dataForm = $request->all();

        $dataForm['user_id'] = $auth['id'];

        $data = $this->categoryCosts->findOrFail($id)->update($dataForm);

        if($data){
            return redirect()
                ->route('categories.index')
                ->with(['success' => 'Atualização realizada com sucesso!']);
        }else{
            return redirect()
                ->route('categories.edit')
                ->withErrors(['errors' => 'Falha ao atualizar!'])
                ->withInput();
        }

    }

    public function show($id)
    {
        $auth = Auth::user();
        $category = $this->findOneBy([
            'id' => $id,
            'user_id' => $auth['id']
        ]);
        return view('admin.costs.category.show', compact('category'));
    }

    public function destroy($id)
    {
        $auth = Auth::user();
        $category = $this->findOneBy([
            'id' => $id,
            'user_id' => $auth['id']
        ]);

        $data = $category->delete();

        if($data){
            return redirect()
                ->route('categories.index')
                ->with(['success' => 'Categoria Excluida com sucesso!']);
        }else{
            return redirect()
                ->route('categories.edit')
                ->withErrors(['errors' => 'Falha ao atualizar!'])
                ->withInput();
        }
        return redirect()->to('/costs/categories');

    }

    public function findByField($field, $value)
    {
        return $this->categoryCosts->where($field, '=', $value)->get();
    }

    public function findOneBy(array $search)
    {
        $queryBuilder = $this->categoryCosts;
        foreach ($search as $field => $value){
            $queryBuilder = $queryBuilder->where($field,'=',$value);
        }
        return $queryBuilder->firstOrFail();
    }
}
