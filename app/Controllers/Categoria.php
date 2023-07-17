<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModeloCategoria;
use App\Models\ModeloNoticias;
use CodeIgniter\Exceptions\PageNotFoundException;

class Categoria extends BaseController
{

     public function criar()
     {
          helper('form');

          if (!$this->request->is('post')) {
               return view('templates/header', [
                    'title' => 'Criar uma Categoria'
               ]) . view('categorias/criar') .
                    view('templates/footer');
          }
          $postRequest = $this->request->getPost(['nome', 'corpo']);
          if (
               !$this->validateData($postRequest, [
                    'nome' => 'required|max_length[255]|min_length[3]',
                    'corpo' => 'required|max_length[50000]|min_length[15]',
               ])
          ) {
               return view('templates/header', [
                    'title' => 'Crie Uma Categoria'
               ]) . view('categorias/criar') .
                    view('templates/footer');
          }


          $model = model(ModeloCategoria::class);
          $model->save([
               'nome' => $postRequest['nome'],
               'slug' => url_title($postRequest['nome'], '-', true),
               'corpo' => $postRequest['corpo'],
          ]);
          return view('templates/header', ['titulo' => "Criar Uma Notícia"]) . view('noticias/successo') . view('templates/footer');

     }
     public function index()
     {


          $modeloCategoria = model(ModeloCategoria::class);

          $categorias = $modeloCategoria->getCategorias();

          $data = [
               'titulo' => 'Categorias',
               'categorias' => $categorias
          ];



          return view('templates/header', $data)
               . view('categorias/index')
               . view('templates/footer');
     }

     public function view($slug = null)
     {
          $model = model(ModeloCategoria::class);

          $newsModel = model(ModeloNoticias::class);
          $data['categorias'] = $model->getCategorias($slug);

          if (empty($data['categorias'])) {
               throw new PageNotFoundException('Não achamos a sua categoria' . $slug);
          }

          $noticias = $newsModel->getNewsByCategory($data['categorias']['id']);


          $data = [
               'categorias' => $data['categorias'],
               'titulo' => $data['categorias']['nome'],
               'noticias' => $noticias,
          ];




          return view('templates/header', $data)
               . view('categorias/view')
               . view('templates/footer');



     }
}