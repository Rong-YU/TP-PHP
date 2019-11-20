<?php require "view_begin.php" ?>

<?php require "view_list_nobel.php"?>


<div class="listePages">
  <p>Pages:</p>
  <a class="lienStart" href="?controller=<?=$controller?>&action=pagination&start=<?= $current-1 ?>"><img class="icone" src="Content/img/previous-icon.png">
  <?php if($pages_debut == 0): $pages_debut=1?><?php endif ?>
  <?php for($i = $pages_debut; $i < $pages_debut+10; $i++):?>
  <a class="lienStart <?php if($i == $current):?>active<?php endif ?>" href="?controller=<?=$controller?>&action=pagination&start=<?= $i ?>"><?= $i ?></a>
  <?php endfor?>
<a class="lienStart" href="?controller=<?=$controller?>&action=pagination&start=<?= $current+1 ?>"><img class="icone" src="Content/img/next-icon.png">
</div>
<?php require "view_end.php"?>
