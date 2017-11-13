<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class VendaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRealizarVenda()
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1024, 768)
                    ->visit("/")
                    ->select('produto_id', 9)
                    ->select('fornecedor_id', 3)
                    ->type("quantidade", 10)
                    ->click("div > div > form > button")
                    ->assertSeeIn(".alert", "Venda realizada com sucesso!");


        });
    }
}
