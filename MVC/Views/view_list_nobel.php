<table>
<tr><th>Name</th><th>Category</th><th>Year</th><th class="sansBordure"></th><th class="sansBordure"></th></tr>
<?php foreach($tab as $personne):?>
<tr>
  <td> <a href="?controller=list&action=informations&id=<?= e($personne["id"])?>"><?= e($personne["name"])?></td>
  <td><?= e($personne["category"])?></td>
  <td><?= e($personne["year"])?></td>
  <td class="sansBordure"><a href="?controller=set&action=remove&id=<?=e($personne["id"])?>"><img src="Content/img/remove-icon.png"></a></td>
  <td class="sansBordure"><a href="?controller=set&action=form_update&id=<?=e($personne["id"])?>"><img src="Content/img/edit-icon.png"></a></td>
</tr>
<?php endforeach ?>

</table>
