<?php

namespace Elaborata\Mercado\Produtos;

/**
 * Description of Produto
 *
 * @author aluno
 */
class Produto
{
    private $codigo;
    private $nome;
    private $precoUnitario;
    private $quantidadeEstoque;
    private $desconto = 0;
    
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNome() 
    {
        return $this->nome;
    }

    public function getPrecoUnitario()
    {
        return $this->precoUnitario;
    }

    public function getQuantidadeEstoque()
    {
        return $this->quantidadeEstoque;
    }

    public function getDesconto()
    {
        return $this->desconto;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setPrecoUnitario($precoUnitario)
    {
        $this->precoUnitario = $precoUnitario;
    }

    public function setQuantidadeEstoque($quantidadeEstoque)
    {
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;
    }
}
