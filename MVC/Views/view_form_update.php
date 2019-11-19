<?php require("view_begin.php")?>

<form action="?controller=set&action=update" method="post">

<p><label>Id: <input type="text" name="id" value="<?= e($id) ?>"></label></p>
<p><label>Name: <input type="text" name="name" value="<?= e($name) ?>"></label></p>
<p><label>Year: <input type="text" name="year" value="<?= e($year) ?>"></label></p>
<p><label>Birth Date: <input type="text" name="birthdate" value="<?= e($birthdate)?>"></label></p>
<p><label>Birth Place: <input type="text" name="birthplace" value="<?= e($birthplace)?>"></label></p>
<p><label>Country: <input type="text" name="county" value="<?= e($county)?>"></label></p>
<?php foreach($categories as  $v) :?>
<p><label><input type="radio" name="category" value="<?=e($v)?>" <?php if($v == $category): ?> checked <?php endif?>> <?=$v?> </label></p>
<?php endforeach ?>
<label>motivation: <textarea name="motivation" cols="70" rows="10"> <?= e($motivation)?></textarea></label>
<p><input type="submit" value="update"></p>
</form>

<?php require("view_end.php")?>
