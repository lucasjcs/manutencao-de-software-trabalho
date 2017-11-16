<?php

namespace Tests\Browser;

use App\Fornecedor;
use App\Produto;
use App\Venda;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class VendaTest extends DuskTestCase
{
    use DatabaseTransactions;

    public function testRealizarVenda()
    {
        $produto = Produto::create([
            'nome'=>'Iphone X',
            'preco'=>6000.00,
            'quantidade'=>10
        ]);
        $fornecedor = factory(Fornecedor::class)->create();
        $venda = (new Venda())->realizarVenda($produto, 8, $fornecedor);
        $this->assertEquals(2, $produto->quantidade);

    }

    public function testCriaFornecedorComCPF()
    {
        $fornecedor = Fornecedor::create([
            'nome'=>'José Ribeiro',
            'email'=>'fabricio.jhonata@gmail.com',
            'cpf'=>'123.456.321-90'
        ]);

        $this->assertEquals('123.456.321-90', $fornecedor->cpf);
    }

    public function testVerificaValidacaoNosCampos()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit("/produtos/create")
                ->type("nome", '')
                ->type('preco', 'vinte reais')
                ->type('quantidade', 'dez')
                ->click('form button')
                ->assertDontSee("Novo Produto inserido com sucesso!");

            $browser->visit("/fornecedors/create")
                ->type("nome", '')
                ->type('email', 'email-invalido')
                ->assertDontSee("Novo Fornecedor inserido com sucesso!");

        });
    }

    public function testVerificaBotaoNaInterface()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit("/")
                ->assertSeeIn('#bt-relatorio', 'Relatório de Vendas');
        });
    }
}
