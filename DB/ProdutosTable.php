<?php

namespace Elaborata\Mercado\DB;

use Elaborata\Mercado\Produtos\Produto;
/**
 * Description of ProdutosTable
 *
 * @author aluno
 */
class ProdutosTable extends Table
{
    /**
     * Retorna o produto pelo código informado.
     * @param string $codigo
     * @return Produto | false
     */
    public function buscar($codigo)
    {
        $sql = "SELECT *
              FROM produtos
              WHERE cod = $codigo";
        
        $return = $this->getDBcon()->query($sql);
        $return->setFetchMode(\PDO::FETCH_CLASS,'Elaborata\Mercado\Produtos\Produto');
        return $return->fetch();
    }
    
    public function inserir(Produto $produto)
    {
        $sql = "INSERT INTO produtos (cod, nome, quantidade, precoUnitario, desconto) 
                VALUES ('".$produto->getCodigo()."',
                         '".$produto->getNome()."',
                        '".$produto->getQuantidadeEstoque()."',
                        '".$produto->getPrecoUnitario()."',
                        '".$produto->getDesconto()."')";
        
        $return = $this->getDBcon()->exec($sql);
        return $return;
    }
    
    public function atualizar(Produto $produto)
    {
        $sql = "UPDATE produtos SET
            quantidade = '".$produto->getQuantidadeEstoque()."',
            desconto = '".$produto->getDesconto()."',
            precoUnitario = '".$produto->getPrecoUnitario()."'    
            WHERE  cod ='".$produto->getCodigo()."'";
        
        try {
            $return = $this->getDBcon()->exec($sql);
            
        } catch (\PDOException $ex) {

        }
        return $return;
    }

}
