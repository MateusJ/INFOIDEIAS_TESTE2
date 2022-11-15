<?php



use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\Model as Paginator;

class Noticia extends BaseModel
{
    private $id;
    private $titulo;
    private $texto;
    private $data_ultima_atualizacao;
    private $data_cadastro;

    public function initialize()
    {
        $this->setSource("noticia");
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getTexto()
    {
        return $this->texto;
    }

    public function getdata_ultima_atualizacao()
    {
        return $this->data_ultima_atualizacao;
    }

    public function setdata_ultima_atualizacao($data_ultima_atualizacao)
    {
        $this->data_ultima_atualizacao = $data_ultima_atualizacao;

        return $this;
    }

    public function getData_cadastro()
    {
        return $this->data_cadastro;
    }

    public function setData_cadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
