<?php

use Phalcon\Validation;

class Noticia_Categoria extends BaseModel
{
    private $noticia_id;
    private $categoria_id;


    public function initialize()
    {
        $this->setSource("noticia_categoria");
    }

    /**
     * Get the value of noticia_id
     */ 
    public function getNoticia_id()
    {
        return $this->noticia_id;
    }

    /**
     * Set the value of noticia_id
     *
     * @return  self
     */ 
    public function setNoticia_id($noticia_id)
    {
        $this->noticia_id = $noticia_id;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }
}
