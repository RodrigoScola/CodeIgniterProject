<?php

namespace App\Cells;


class Post
{
     public function mostrar($post = null)
     {
          if (empty($post) || !$post) {
               return null;
          }
          ob_start();
          ?>
          <div>
               <h5 class="text-title ">
                    <a href="/noticias/<?= esc($post['slug'], 'url') ?>">

                         <?= esc($post['titulo']) ?>
                    </a>
               </h5>

               <p>
                    <?= esc($post['corpo']) ?>
               </p>
               <div>
                    <?php
                    if (!empty($post['categorias']) && is_array($post['categorias'])) {

                         foreach ($post['categorias'] as $category) {
                              ?>
                              <a href="/categorias/<?= esc($category['slug'], 'url') ?>" class="badge bg-primary">
                                   <?= $category['nome'] ?>
                              </a>
                              <?php
                         }
                    }
                    ?>
               </div>
          </div>

          <?php


          return ob_get_clean();
     }
}