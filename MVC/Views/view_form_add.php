<?php require("view_begin.php")?>

<form action="?controller=set&action=add" method="post">


<p><label>Name: <input type="text" name="name"></label></p>
<p><label>Year: <input type="text" name="year"></label></p>
<p><label>Birth Date: <input type="text" name="birthdate"></label></p>
<p><label>Birth Place: <input type="text" name="birthplace"></label></p>
<p><label>Country: <input type="text" name="county"></label></p>
<?php foreach($category as  $v) :?>
<p><label><input type="radio" name="category" value="<?=e($v)?>"> <?=$v?> </label></p>
<?php endforeach ?>
<label>motivation: <textarea name="motivation" cols="70" rows="10"></textarea></label>
<p><input type="submit" value="Add in database"></p>
</form>

<?php require("view_end.php")?>
