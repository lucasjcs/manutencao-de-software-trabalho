<?php
namespace App\Http\Controllers;

use App\Forms\FornecedorForm;
use App\Fornecedor;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all()->reverse();
        return view('fornecedor.index', compact('fornecedores'));
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(FornecedorForm::class, [
            'method' => 'POST',
            'url' => route('fornecedors.store')
        ]);
        return view('fornecedor.create', compact('form'));
    }


    public function edit(Fornecedor $fornecedor, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(FornecedorForm::class, [
            'method' => 'PUT',
            'url' => route('fornecedors.update',['id'=>$fornecedor->id]),
            'model'=>$fornecedor
        ]);
        return view('fornecedor.edit')->with(compact('form'))->with(compact('fornecedor'));
    }

    public function store(Request $request)
    {
        Fornecedor::create($request->all());
        return redirect()->route('fornecedors.index')->with("adicionado", true);
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {
        $fornecedor->update($request->all());
        return redirect()->route('fornecedors.index')->with("atualizado", true);
    }

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
        return redirect()->route('fornecedors.index')->with("deletado", $fornecedor->nome);
    }
}
