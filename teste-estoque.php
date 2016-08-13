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

//echo '<pre>';var_dump($prod1);

$estoque = Estoque::getinstance();
$estoque->addEstoque($prod1);
echo '<pre>'; var_dump($estoque->procuraProduto('123123'));
//echo '<pre>';var_dump($estoque);
try{
    $estoque->removeEstoque($prod1, 2);
    $estoque->removeEstoque($prod1, 20);
    echo '<pre>';var_dump($estoque);
} catch (Exception $ex) {
    echo "Ocorreum problema: ". $ex->getMessage();
}

$prod2  = new Produto();
$prod2->setCodigo('123123');
$prod2->setQuantidadeEstoque(1);

$estoque->totalDisponivel();

echo '<pre>';var_dump($estoque);