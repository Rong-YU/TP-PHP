<?php require("view_begin.php")?>

<form action="?controller=search&action=pagination" method="post">

<h1>Find among Nobel Prizes</h1>
<p><label>Name contains: <input type="text" name="name"></label></p>

<p><label>Year:
  <select name="signYear">
    <option value="&lt;="><=</option>
    <option value="&gt;=">>=</option>
    <option value="=">==</option>
  </select>
  <input type="text" name="year"></label>
</p>
<p><label>Category:
    <?php foreach ($categories as $c) :?>
    <p><input type="checkbox" name="categories[]" value="<?=$c?>"> <?=$c?></p>
  <?php endforeach ?>
  </select>
</p>


<p><input type="submit" value="Search"></p>
</form>

<?php require("view_end.php")?>
