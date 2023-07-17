<?php
namespace App\Controllers;

use App\Models\ModeloCategoria;
use App\Models\ModeloNoticias;
use CodeIgniter\Exceptions\PageNotFoundException;


class Noticia extends BaseController
{
     public function criar()
     {
          helper('form');

          $categoryModel = model(ModeloCategoria::class);

          $categories = $categoryModel->getCategorias();

          if (!$this->request->is('post')) {
               return view('templates/header', [
                    'titulo' => 'Criar uma Noticia',
                    'categorias' => $categories,
               ]) . view('noticias/criar') .
                    view('templates/footer');
          }
          $postRequest = $this->request->getPost(['titulo', 'corpo', 'categorias']);
          if (
               !$this->validateData($postRequest, [
                    'titulo' => 'required|max_length[255]|min_length[3]',
                    'corpo' => 'required|max_length[50000]|min_length[15]',
               ])
          ) {
               return view('templates/header', [
                    'titulo' => 'create a news item',
                    'categoria' => $categories,
               ]) . view('noticias/criar') .
                    view('templates/footer');
          }


          $model = model(ModeloNoticias::class);

          $model->save([
               'titulo' => $postRequest['titulo'],
               'slug' => url_title($postRequest['titulo'], '-', true),
               'corpo' => $postRequest['corpo'],
               'categorias' => implode(',', $postRequest['categorias'])
          ]);

          return view('templates/header', ['titulo' => "Criar uma noticia", 'categorias' => $categories]) . view('noticias/success') . view('templates/footer');
     }
     public function index()
     {
          $model = model(ModeloNoticias::class);

          $news = $model->getNoticias();
          $categoryModel = model(ModeloCategoria::class);

          $categories = $categoryModel->getCategorias();

          $all_categories = $categoryModel->getCategoriasnosPosts($news);

          foreach ($news as $index => $news_item) {
               $categoriesIds = array_filter(explode(',', $news_item['categorias']), function ($item) {
                    return $item == true;
               });
               $currentCategories = [];
               foreach ($categoriesIds as $categoryId) {
                    if (array_key_exists($categoryId, $all_categories)) {
                         array_push($currentCategories, $all_categories[$categoryId]);
                    }
               }
               $news_item['categorias'] = $currentCategories;
               $news[$index] = $news_item;
          }



          $data = [
               'noticias' => $news,
               'titulo' => 'Artigos de Notícias',
               'categorias' => $categories
          ];



          return view('templates/header', $data)
               . view('noticias/index')
               . view('templates/footer');
     }

     public function view($slug = null)
     {
          $model = model(ModeloNoticias::class);

          $data['noticias'] = $model->getNoticias($slug);


          if (empty($data['noticias'])) {
               throw new PageNotFoundException('Cannot find the news item: ' . $slug);
          }

          $data['titulo'] = $data['noticias']['titulo'];



          return view('templates/header', $data)
               . view('noticias/view')
               . view('templates/footer');
     }
}