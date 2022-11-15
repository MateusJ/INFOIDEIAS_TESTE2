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
    }

    public function cadastrarAction()
    {
        if ($this->request->isPost()) {
            $novaNoticia = new Noticia();

            $novaNoticia->setTitulo($this->request->getPost("titulo"));
            $novaNoticia->setTexto($this->request->getPost("texto"));
            $novaNoticia->setData_cadastro(date('Y-m-d H:i:s'));
            $novaNoticia->setdata_ultima_atualizacao(date('Y-m-d H:i:s'));

            if (!$novaNoticia->save()) {
                $this->flash->error('krl deu merda');
            }
            $this->flash->success('krl deu certo');
        }
    }

    public function editarAction()
    {

        if ($this->request->isPost()) {

            $id = $this->request->getPost("id");
            $noticia = Noticia::findFirst($id);
            
            $noticia->setTitulo($this->request->getPost("titulo"));
            $noticia->setTexto($this->request->getPost("texto"));
            $noticia->setdata_ultima_atualizacao(date('Y-m-d H:i:s'));
            $noticia->setData_cadastro($noticia->getData_cadastro());
            

            if (!$noticia->save()) {
                $this->flash->error('krl deu merda');
            }
            $this->flash->success('krl deu certo');
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
            $this->flash->error('krl deu merda');
        }
        $this->flash->success('krl deu certo');
    }
}
