<h2>
     <?php echo esc($title) ?>
</h2>

<?php
session()->getFlashdata('error');
validation_list_errors();
?>

<form action="/categories/create" method="post">
     <?php echo csrf_field() ?>

     <label for="name">Name</label>
     <input type="input" name='name' value="<?php echo set_value('name') ?>" />

     <label for="body">Text</label>
     <textarea name="body" id="text" cols="30" rows="10"><?php echo set_value('body') ?></textarea>
     <br />
     <input type="submit" name="submit" value="create category item" />

</form>