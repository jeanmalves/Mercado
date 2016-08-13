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
    static private $instance = null;
    private $produtos = array();
    
    private function __construct() 
    {
        
    }

    static public function getinstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function totalDisponivel()
    {    
        echo count($this->produtos);
    }
    /**
     * Adiciona o produto no gerenciador do estoque
     * @param Produto $produto
     * @return Estoque
     */
    public function addEstoque(Produto $produto)
    {
        $prodEstoque = $this->retornaProduto($produto);
        
        if ($prodEstoque == null) {
            array_push($this->produtos, $produto);
        } else {
            $nome = ($produto->getNome() != null)? $produto->getNome() : $prodEstoque->getNome();
            $prodEstoque->setNome($nome);
            
            $desconto = ($produto->getDesconto() != null)? $produto->getDesconto() : $prodEstoque->getDesconto();
            $prodEstoque->setDesconto($desconto);
            
            $quant = ($produto->getQuantidadeEstoque() > 0)? $produto->getQuantidadeEstoque() + $prodEstoque->getQuantidadeEstoque() : $prodEstoque->getQuantidadeEstoque(); 
            $prodEstoque->setQuantidadeEstoque($quant);
            
            $precoUnitario = ($produto->getPrecoUnitario() > 0)? $produto->getPrecoUnitario() : $prodEstoque->getPrecoUnitario();
            $produto->setPrecoUnitario($precoUnitario);
            
        }
        
        return $this;
    }
    
    public function removeEstoque(Produto $produto, $quant)
    {
        $quantidadeAtual = $produto->getQuantidadeEstoque();
        
        if (($quantidadeAtual - $quant) < 0) {
            throw new \Exception("Não existe em estoque a quantidade informada");
        }
        
        $prodEstoque = $this->retornaProduto($produto);
        $prodEstoque->setQuantidadeEstoque($quantidadeAtual - $quant);
        
        return $this;
    }
    
    public function procuraProduto($codigo)
    {
        foreach ($this->produtos as $produto) {
            if ($produto->getCodigo() == $codigo) {
                return $produto;
            }
        }
    }
    
    /**
     * 
     * @param Produto $produto
     * @return Produto | null
     */
    private function retornaProduto(Produto $produto)
    {
        foreach ($this->produtos as $produtoEstoque) {
            if ($produtoEstoque->getCodigo() == $produto->getCodigo()) {
                return $produtoEstoque;
            }
        }
        return NULL;
    }
}
