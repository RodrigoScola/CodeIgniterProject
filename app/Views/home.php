<?php

?>
<h2 class="text-center my-2 mb-5">Noticias
</h2>
<div class="container grid grid-col-3">
     <?php
     foreach ($noticias as $item) {
          ?>
          <div class="col my-5">
               <?php
               echo view_cell("Post::mostrar", $item);

               ?>
          </div>
     <?php }
     ?>

</div>
<h2 class="text-center mt-5">
     Categorias
</h2>
<div class="d-flex justify-content-center gap-2">
     <?php

     foreach ($categorias as $category) {
          ?>
          <div class="">
               <?php
               echo view_cell("Categoria::mostrar", $category);
               ?>
          </div>
          <?php
     }
     ?>

</div>