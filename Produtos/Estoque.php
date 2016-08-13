<?php

namespace Elaborata\Mercado\Produtos;

use Elaborata\Mercado\Produtos\Produto;

/**
 * Description of Estoque
 *
 * @author aluno
 */
class Estoque 
{
    private $produtos = array();
    
    public function totalDisponivel()
    {    
        echo count($this->produtos);
    }
    
    public function addEstoque(Produto $produto)
    {
        $this->produtos[] = $produto;
    }
    
    public function removeEstoque($produto, $quant)
    {
        
    }
    
    public function procuraProduto($codigo)
    {
        
    }
}
