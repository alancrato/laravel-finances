<?php

namespace App\Http\Controllers\Admin\Bill;

use App\Models\BillPay;
use App\Models\CategoryCosts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    /**
     * @var BillPay
     */
    private $pay;
    /**
     * @var CategoryCosts
     */
    private $categoryCosts;

    /**
     * PayController constructor.
     */
    public function __construct(BillPay $pay, CategoryCosts $categoryCosts)
    {
        $this->pay = $pay;
        $this->categoryCosts = $categoryCosts;
    }

    public function index()
    {
        $auth = Auth::user();
        $pays = $this->findByField('user_id', $auth['id']);
        return view('admin.bills.pay.index', compact('pays'));
    }

    public function create()
    {
        $auth = Auth::user();
        $categories = $this->findByFieldCat('user_id', $auth['id']);
        $pay = $this->pay;
        return view('admin.bills.pay.create', compact('pay', 'categories'));
    }

    public function store(Request $request)
    {
        $auth = Auth::user();

        $this->validate($request, $this->pay->rules());

        $dataForm = $request->all();

        $dataForm['user_id'] = $auth['id'];

        $data = $this->pay->create($dataForm);

        if($data){
            return redirect()
                ->route('pay.index')
                ->with(['success' => 'Despesa cadastrada com sucesso!']);
        }else{
            return redirect()
                ->route('pay.create')
                ->withErrors(['errors' => 'Falha ao cadastrar!'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $auth = Auth::user();
        $pay = $this->findOneBy([
            'id' => $id,
            'user_id' => $auth['id']
        ]);
        $categories = $this->findByFieldCat('user_id', $auth['id']);
        return view('admin.bills.pay.edit', compact('pay','categories'));
    }

    public function update(Request $request, $id)
    {
        $auth = Auth::user();

        $this->validate($request, $this->pay->rules($id));

        $dataForm = $request->all();

        $dataForm['user_id'] = $auth['id'];

        $data = $this->pay->findOrFail($id)->update($dataForm);

        if($data){
            return redirect()
                ->route('pay.index')
                ->with(['success' => 'Despesa atualizada com sucesso!']);
        }else{
            return redirect()
                ->route('pay.edit')
                ->withErrors(['errors' => 'Falha ao atualizar!'])
                ->withInput();
        }
    }

    public function show($id)
    {
        $auth = Auth::user();
        $pay = $this->findOneBy([
            'id' => $id,
            'user_id' => $auth['id']
        ]);
        return view('admin.bills.pay.show', compact('pay'));
    }

    public function destroy($id)
    {
        $auth = Auth::user();
        $pay = $this->findOneBy([
            'id' => $id,
            'user_id' => $auth['id']
        ]);

        $data = $pay->delete();

        if($data){
            return redirect()
                ->route('pay.index')
                ->with(['success' => 'Despesa Excluida com sucesso!']);
        }else{
            return redirect()
                ->route('pay.show')
                ->withErrors(['errors' => 'Falha ao Excluir!'])
                ->withInput();
        }
        return redirect()->to('/bills/pays');
    }


    public function findByField($field, $value)
    {
        return $this->pay->where($field, '=', $value)->get();
    }

    public function findByFieldCat($field, $value)
    {
        return $this->categoryCosts->where($field, '=', $value)->get();
    }

    public function findOneBy(array $search)
    {
        $queryBuilder = $this->pay;
        foreach ($search as $field => $value){
            $queryBuilder = $queryBuilder->where($field,'=',$value);
        }
        return $queryBuilder->firstOrFail();
    }
}
