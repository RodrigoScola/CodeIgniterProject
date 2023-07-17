<h2>
     <?php echo esc($titulo) ?>
</h2>

<?php
session()->getFlashdata('error');
validation_list_errors();
?>

<form action="/noticias/criar" method="post">
     <?php echo csrf_field() ?>

     <label for="titulo">Title</label>
     <input type="input" name='titulo' value="<?php echo set_value('titulo') ?>" />

     <label for="corpo">Text</label>
     <textarea name="corpo" id="text" cols="30" rows="10"><?php echo set_value('corpo') ?></textarea>
     <br />

     <?php
     foreach ($categorias as $category) { ?>
          <div>
               <label for="<?= $category['nome'] ?>"><?= $category['nome'] ?></label>
               <input type="checkbox" name="categorias[]" value="<?= $category['id'] ?>" />
          </div>
     <?php }
     ?>

     <input type="submit" name="submit" value="Criar uma Noticia" />

</form>