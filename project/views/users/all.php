<?php foreach($users as $user):?>
    <p><a href="/users/edit/<?= $user['id']?>"><?= $user['username']?></a></p>
<?php endforeach;?>