<?php

namespace App\Models;

use App\ThirdParty\DataStructures\Set;
use CodeIgniter\Model;

class ModeloCategoria extends Model
{
     protected $table = 'categorias';

     protected $allowedFields = ['nome', 'slug', 'corpo'];

     public function getCategoriasnosPosts(array $posts)
     {

          $idsCategorias = new Set();
          foreach ($posts as $post) {
               if (!is_null($post['categorias'])) {
                    $cat = array_filter(explode(',', $post['categorias']), function ($item) {
                         return $item == true;
                    });
                    foreach ($cat as $categoryId) {
                         $idsCategorias->add($categoryId);
                    }

               }

          }
          return $this->getCategorias($idsCategorias->getItems());
     }


     public function getCategorias($categoriesIds = false)
     {
          if ($categoriesIds === false || (empty($categoriesIds) && is_array($categoriesIds))) {
               return $this->findAll();
          }
          if (is_array($categoriesIds)) {
               return $this->whereIn('id', $categoriesIds)->findAll();
          }
          return $this->where([
               'nome' => $categoriesIds
          ])->first();

     }



}