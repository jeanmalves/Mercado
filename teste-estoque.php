<?php

require_once './Produtos/Produto.php';
require_once './Produtos/Estoque.php';

use Elaborata\Mercado\Produtos\Produto;
use Elaborata\Mercado\Produtos\Estoque;

$prod1 = new Produto();
$prod1->setCodigo('123123');
$prod1->setNome("Macarrão Dona Helena");
$prod1->setPrecoUnitario(7.40);
$prod1->setQuantidadeEstoque(10);

echo '<pre>';var_dump($prod1);

$estoque = new Estoque();
$estoque->addEstoque($prod1);

echo '<pre>';var_dump($estoque);

$estoque->totalDisponivel();