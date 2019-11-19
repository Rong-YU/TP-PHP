
<?php require "view_begin.php" ?>
<ul>
  <?php foreach($tab as $c => $v) :?>
  <li><?= e($c) ?> :
    <?php if(!empty($v)) :?>
    <?= e($v) ?>
  <?php else :?>
    ???
  <?php endif ?>
  </li>
<?php endforeach ?>
</ul>

<?php require "view_end.php" ?>
