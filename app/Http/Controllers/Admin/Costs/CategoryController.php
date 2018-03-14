<?php

namespace App\Http\Controllers\Admin\Costs;

use App\CategoryCosts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $this->categoryCosts = $categoryCosts;
    }

    public function index()
    {
        $categories = $this->categoryCosts->orderBy('id', 'DESC')->paginate();
        return view('admin.costs.category.index', compact('categories'));

    }

    public function create()
    {
        return view('admin.costs.category.create', ['categories' => $this->categoryCosts]);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->categoryCosts->rules());

        $data = $this->categoryCosts->create($request->all());

        if($data){
            return redirect()
                ->route('categories.index')
                ->with(['success' => 'Cadastro realizado com sucesso!']);
        }else{
            return redirect()
                ->route('categories.create')
                ->withErrors(['errors' => 'Falha ao cadastrar!'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $categories = $this->categoryCosts->find($id);
        return view('admin.costs.category.edit', compact('categories'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->categoryCosts->rules($id));

        $data = $this->categoryCosts->find($id)->update($request->all());

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
        $cat = $this->categoryCosts->find($id);
        return view('admin.costs.category.show', compact('cat'));
    }

    public function destroy($id)
    {
        $cat = $this->categoryCosts->find($id);
        $cat->delete();
        return redirect()->to('/costs/categories');

    }
}
