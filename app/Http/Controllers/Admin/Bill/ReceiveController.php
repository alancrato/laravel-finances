<?php

namespace App\Http\Controllers\Admin\Bill;

use App\Models\BillReceive;
use App\Http\Controllers\Controller;
use App\Models\CategoryCosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiveController extends Controller
{
    /**
     * @var BillReceive
     */
    private $receive;
    /**
     * @var CategoryCosts
     */
    private $categoryCosts;


    /**
     * ReceiveController constructor.
     */
    public function __construct(BillReceive $receive, CategoryCosts $categoryCosts)
    {
        $this->receive = $receive;
        $this->categoryCosts = $categoryCosts;
    }

    public function index()
    {
        $auth = Auth::user();
        $receives = $this->findByField('user_id', $auth['id']);
        return view('admin.bills.receive.index', compact('receives'));
    }

    public function create()
    {
        $auth = Auth::user();
        $categories = $this->findByFieldCat('user_id', $auth['id']);
        $receives = $this->receive;
        return view('admin.bills.receive.create', compact('receives', 'categories'));
    }

    public function store(Request $request)
    {
        $auth = Auth::user();

        $this->validate($request, $this->receive->rules());

        $dataForm = $request->all();

        $dataForm['user_id'] = $auth['id'];

        $data = $this->receive->create($dataForm);

        if($data){
            return redirect()
                ->route('receive.index')
                ->with(['success' => 'Receita cadastrada com sucesso!']);
        }else{
            return redirect()
                ->route('receive.create')
                ->withErrors(['errors' => 'Falha ao cadastrar!'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $auth = Auth::user();
        $receives = $this->findOneBy([
            'id' => $id,
            'user_id' => $auth['id']
        ]);
        $categories = $this->findByFieldCat('user_id', $auth['id']);
        return view('admin.bills.receive.edit', compact('receives','categories'));
    }

    public function update(Request $request, $id)
    {
        $auth = Auth::user();

        $this->validate($request, $this->receive->rules($id));

        $dataForm = $request->all();

        $dataForm['user_id'] = $auth['id'];

        $data = $this->receive->findOrFail($id)->update($dataForm);

        if($data){
            return redirect()
                ->route('receive.index')
                ->with(['success' => 'Receita atualizada com sucesso!']);
        }else{
            return redirect()
                ->route('receive.edit')
                ->withErrors(['errors' => 'Falha ao atualizar!'])
                ->withInput();
        }
    }

    public function show($id)
    {
        $auth = Auth::user();
        $receive = $this->findOneBy([
            'id' => $id,
            'user_id' => $auth['id']
        ]);
        return view('admin.bills.receive.show', compact('receive'));
    }

    public function destroy($id)
    {
        $auth = Auth::user();
        $receive = $this->findOneBy([
            'id' => $id,
            'user_id' => $auth['id']
        ]);

        $data = $receive->delete();

        if($data){
            return redirect()
                ->route('receive.index')
                ->with(['success' => 'Receita Excluida com sucesso!']);
        }else{
            return redirect()
                ->route('receive.edit')
                ->withErrors(['errors' => 'Falha ao atualizar!'])
                ->withInput();
        }
        return redirect()->to('/bills/receive');
    }

    public function findByField($field, $value)
    {
        return $this->receive->where($field, '=', $value)->get();
    }

    public function findByFieldCat($field, $value)
    {
        return $this->categoryCosts->where($field, '=', $value)->get();
    }

    public function findOneBy(array $search)
    {
        $queryBuilder = $this->receive;
        foreach ($search as $field => $value){
            $queryBuilder = $queryBuilder->where($field,'=',$value);
        }
        return $queryBuilder->firstOrFail();
    }

}
