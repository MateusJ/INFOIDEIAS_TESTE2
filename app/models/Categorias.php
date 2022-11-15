<?php



use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\Model as Paginator;

class Categorias extends BaseModel
{
    private $id;
    private $nome;
    private $descricao;

    public function initialize()
    {
        $this->setSource("categorias");
        $this->view->setVars(
            [
                'id' => $this->id,
                'nome' => $this->nome,
            ]
        );
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
}
