<h2>
     <?= esc(ucfirst($categorias['nome'])) ?>
</h2>
<p>
     <?= esc($categorias['corpo']) ?>
</p>

<div class="container mt-4 row">
     <?php
     foreach ($noticias as $item) {
          ?>
          <div class="col">
               <?php
               echo view_cell("Post::mostrar", $item);

               ?>
          </div>
     <?php }
     ?>

</div>