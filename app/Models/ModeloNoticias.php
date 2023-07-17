<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloNoticias extends Model
{

     protected $table = 'noticias';

     protected $allowedFields = ['titulo', 'slug', 'corpo', 'categorias'];


     public function getNoticiasComCategorias()
     {
          $model = model(ModeloNoticias::class);

          $news = $model->getNoticias();
          $categoryModel = model(ModeloCategoria::class);
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
          return $news;
     }

     public function getNewsByCategory(int $category)
     {
          return $this->like('categorias', $category)->findAll();
     }

     public function getNoticias($slug = false, int $limit = 50)
     {
          if ($slug === false) {
               return $this->findAll($limit);
          }
          return $this->where(['slug' => $slug])->first();
     }
}