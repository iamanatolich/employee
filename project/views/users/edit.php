<div id="news" style="padding: 40px 100px 40px 100px;">
    <?php if(!empty($_SESSION['flashErrorMessage'])):?>
        <p class="errorMessage"><?= $_SESSION['flashErrorMessage']?></p><br>
        <?php $_SESSION['flashErrorMessage'] = null;?>
    <?php endif;?>

    <?php if(!empty($_SESSION['flashSuccessMessage'])):?>
        <p class="successMessage"><?= $_SESSION['flashSuccessMessage']?></p><br>
        <?php $_SESSION['flashSuccessMessage'] = null;?>
    <?php endif; ?>


    <form name="edit" method="post" action="" align="center" id="edit">
        <input type="hidden" name="form_name" value="edit">
        <?php foreach ($myProfiles as $myProfile): ?>
            <input type="hidden" name="id" value="<?= $myProfile['id']; ?>">
            <p style="padding-bottom: 15px;"><input style="border: none; border-radius: 5px; padding: 5px 5px;" type="text" name="name" value="<?= $myProfile['name']; ?>"></p>
            <p style="padding-bottom: 15px; border-radius: 5px;"><input style="border: none; border-radius: 5px; padding: 5px 5px;" type="text" name="surname" value="<?= $myProfile['surname']; ?>"></p>
            <p style="padding-bottom: 15px;"><input style="border: none; border-radius: 5px; padding: 5px 5px;" type="text" name="username" value="<?= $myProfile['username']; ?>"></p>
            <p style="padding-bottom: 15px;"><input style="border: none; border-radius: 5px; padding: 5px 5px;" type="password" name="password"></p>


        <?php
        if(\Project\Assets\Functions::getUser()['id_position'] == '2'):
        ?>

            <?php
            if($myProfile['id_position'] == '0'){
                $select = 'Сотрудник';
            }elseif($myProfile['id_position'] == '1'){
                $select = 'Руководитель';
            }elseif($myProfile['id_position'] == '2'){
                $select = 'Администратор';
            }
            ?>
            <p align="center">Роли</p>
            <br>
            <p align="center"><select name="position" style="border: none;">
                    <option value="<?= $myProfile['id_position']; ?>" selected><?= $select; ?></option>
                    <option value="0">Сотрудник</option>
                    <option value="1">Руководитель</option>
                    <option value="2">Администратор</option>
                </select></p>
        <?php endif;?>

        <?php endforeach; ?>

            <p><input type="submit" style="color: white; background-color: #ada27b; border: none; padding: 5px; border-radius: 5px; cursor: pointer;" name="submit" value="Редактировать"></p>

    </form>

</div>