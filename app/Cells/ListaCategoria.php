<?php

namespace App\Cells;


class ListaCategoria
{
     public function mostrar(array $categorias)
     {
          if (empty($categorias)) {
               return null;
          }
          ob_start();
          ?>
          <ul>
               <?php
               foreach ($categorias as $categoria) {
                    ?>
                    <li>
                         <p>
                              <?= esc($categoria['nome']) ?>
                         </p>
                    </li>
                    <?php

               }
               ?>
          </ul>

          <?php


          return ob_get_clean();
     }
}