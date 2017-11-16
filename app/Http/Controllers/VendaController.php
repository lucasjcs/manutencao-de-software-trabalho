<?php

namespace App\Http\Controllers;

use App\Forms\VendaForm;
use App\Fornecedor;
use App\Produto;
use App\Venda;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::all();

        return view('venda.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(VendaForm::class, [
            'method' => 'POST',
            'url' => route('vendas.store')
        ]);

        return view("venda.create", compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = Produto::find($request->all()['produto_id']);
        $fornecedor = Fornecedor::find($request->all()['fornecedor_id']);
        $venda = new Venda();
        $vendeu = $venda->realizarVenda($produto, $request->all()['quantidade'], $fornecedor);
        $vendeu = $vendeu ? 'sim' : 'nao';
        return redirect()->route('vendas.create')->with("vendido", $vendeu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
