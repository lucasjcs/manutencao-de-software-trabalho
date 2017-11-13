<?php
namespace App\Http\Controllers;

use App\Forms\ProdutoForm;
use App\Produto;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all()->reverse();
        return view('produto.index', compact('produtos'));
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ProdutoForm::class, [
            'method' => 'POST',
            'url' => route('produtos.store')
        ]);
        return view('produto.create', compact('form'));
    }


    public function edit(Produto $produto, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(ProdutoForm::class, [
            'method' => 'PUT',
            'url' => route('produtos.update',['id'=>$produto->id]),
            'model'=>$produto
        ]);
        return view('produto.edit')->with(compact('form'))->with(compact('produto'));
    }

    public function store(Request $request)
    {
        Produto::create($request->all());
        return redirect()->route('produtos.index')->with("adicionado", true);
    }

    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produtos.index')->with("atualizado", true);
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with("deletado", $produto->nome);
    }
}
