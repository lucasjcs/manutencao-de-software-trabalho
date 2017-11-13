<?php

Route::resources([
    'fornecedors' => 'FornecedorController',
    'produtos' => 'ProdutoController',
    'vendas' => 'VendaController'
]);

Route::get("/", "VendaController@create");