<?php

use Phalcon\Http\Request;
use Phalcon\Validation;
use Phalcon\Validation\Validator\StringLength\Max;

class NoticiaController extends ControllerBase
{
    private $mensagemDeErro = '';

    public function listaAction()
    {

        $this->view->pick("noticia/listar");
        $noticias = Noticia::find();
        $this->view->setVar('noticias', $noticias);
        $this->view->setVar('number', 0);
    }

    public function cadastrarAction()
    {

        $categoria = Categoria::find();
        $this->view->setVar('categorias', $categoria);


        if ($this->request->isPost()) {
            $novaNoticia = new Noticia();


            $novaNoticia->setTitulo($this->request->getPost("titulo"));
            $novaNoticia->setTexto($this->request->getPost("texto"));
            $novaNoticia->setData_cadastro(date('Y-m-d H:i:s'));
            $novaNoticia->setdata_ultima_atualizacao(date('Y-m-d H:i:s'));

            if (null !== $this->request->getPost("publicado")) {
                $novaNoticia->setPublicado(1);
                $novaNoticia->setDataPublicacao($this->request->getPost("dataPublicacao"));
            } else {
                $novaNoticia->setPublicado(0);
            }


            if (!$novaNoticia->save()) {
                $this->flash->error('Algo inesperado aconteceu!');
            }

            $novaNC = new Noticia_Categoria();

            foreach ($this->request->getPost("categoria") as $cat) {
                $novaNC->setNoticia_id($novaNoticia->getId());
                $novaNC->setCategoria_id($cat);

                if (!$novaNC->save()) {
                    $this->flash->error('Algo inesperado aconteceu!');
                }
            }
            return $this->response->redirect(array('for' => 'noticia.lista'));
        }
    }

    public function editarAction()
    {

        $categoria = Categoria::find();
        $this->view->setVar('categorias', $categoria);

        $id = $this->dispatcher->getParam('id');

        $noticiaEdit = Noticia::findFirst($id);


        $tituloNot = $noticiaEdit->titulo;
        $textoNot = $noticiaEdit->texto;
        $ifChecked = $noticiaEdit->publicado;
        $dataNot = $noticiaEdit->dataPublicacao;

        $this->view->setVar('tituloNot', $tituloNot);
        $this->view->setVar('textoNot', $textoNot);
        $this->view->setVar('ifChecked', $ifChecked);
        $this->view->setVar('dataNot', $dataNot);

        if ($this->request->isPost()) {

            $id = $this->request->getPost("id");

            $noticia = Noticia::findFirst($id);

            $noticia->setTitulo($this->request->getPost("titulo"));
            $noticia->setTexto($this->request->getPost("texto"));
            $noticia->setdata_ultima_atualizacao(date('Y-m-d H:i:s'));
            $noticia->setData_cadastro($noticia->getData_cadastro());

            if (null !== $this->request->getPost("publicado")) {
                $noticia->setPublicado(1);
                $noticia->setDataPublicacao($this->request->getPost("dataPublicacao"));
            } else {
                $noticia->setPublicado(0);
                $noticia->setDataPublicacao();
            }

            if (!$noticia->save()) {
                $this->flash->error('Algo inesperado aconteceu!');
            }


            $NC = Noticia_Categoria::find("noticia_id = $id");

            foreach ($NC as $nc) {
                $nc->delete();
            }



            foreach ($this->request->getPost("categoria") as $cat) {
                $novaNC = new Noticia_Categoria();
                $novaNC->setNoticia_id($noticia->getId());
                $novaNC->setCategoria_id($cat);

                if (!$novaNC->save()) {
                    $this->flash->error('Algo inesperado aconteceu!');
                }
            }
            return $this->response->redirect(array('for' => 'noticia.lista'));
        }
    }

    public function salvarAction()
    {
        return $this->response->redirect(array('for' => 'noticia.lista'));
    }

    public function excluirAction($id)
    {

        $id = $this->dispatcher->getParam('id');

        $noticia = Noticia::findFirst($id);

        if (!$noticia->delete()) {
            $this->flash->error('Algo inesperado aconteceu!');
        }
        return $this->response->redirect(array('for' => 'noticia.lista'));
    }
}
