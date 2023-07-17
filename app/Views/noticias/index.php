<h2 class="my-3">
     <?= esc($titulo) ?>
</h2>

<?php

?>

<?php if (!empty($noticias) && is_array($noticias)): ?>

     <?php foreach ($noticias as $news_item): ?>

          <div class="gap-2 d-flex flex-column ">
               <h3>
                    <a href="/noticias/<?= esc($news_item['slug'], 'url') ?>">
                         <?= esc($news_item['titulo']) ?>
                    </a>
               </h3>
               <div class="main">
                    <?= esc($news_item['corpo']) ?>
               </div>
               <div class="d-flex gap-2">
                    <?php
                    if (!empty($news_item)) {
                         ?>
                         <?php
                         foreach ($news_item['categorias'] as $category) { ?>
                              <div class=" badge bg-primary text-light">

                                   <a class="text-light" href="/categorias/<?= esc($category['slug'], 'url') ?>">
                                        <?= ucfirst($category['nome']) ?>
                                   </a>
                              </div>

                              <?php
                         }
                    }
                    ?>
               </div>
               <p><a href="/noticias/<?= esc($news_item['slug'], 'url') ?>">Ver Mais</a></p>
          </div>
     <?php endforeach ?>

<?php else: ?>

     <h3>Não temos nenhuma Notícia no momento.</h3>


<?php endif ?>