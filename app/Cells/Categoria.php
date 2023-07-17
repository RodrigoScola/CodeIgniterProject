<?php

namespace App\Cells;


class PostCategoria
{
     public function mostrar($post = null)
     {
          if (empty($post) || !$post) {
               return null;
          }
          ob_start();
          ?>
          <h3>
               <a href="/categorias/<?= esc($post['slug'], 'url') ?>">
                    <?= ucfirst(esc($post['nome'])) ?>
               </a>
          </h3>

          <?php


          return ob_get_clean();
     }
}