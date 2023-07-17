<?php if (!empty($categorias) && is_array($categorias)): ?>

     <div class="row">
          <?php foreach ($categorias as $news_item): ?>

               <div class="col">
                    <h3>
                         <?= ucfirst(esc($news_item['nome'])) ?>
                    </h3>
                    <div class="main">
                         <?= ucfirst(esc($news_item['corpo'])) ?>
                    </div>
                    <p><a href="/categorias/<?= esc($news_item['slug'], 'url') ?>">Saber Mais</a></p>
                    <div>
                         </ul>
                    </div>
               </div>
          <?php endforeach ?>

     </div>
<?php else: ?>

     <h3>No News</h3>

     <p>Unable to find any news for you.</p>

<?php endif ?>