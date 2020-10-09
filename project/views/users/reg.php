<div id="news" style="padding: 40px 100px 40px 100px;">
    <?php if(!empty($_SESSION['flashErrorMessage'])):?>
        <p class="errorMessage"><?= $_SESSION['flashErrorMessage']?></p><br>
        <?php $_SESSION['flashErrorMessage'] = null;?>
    <?php endif;?>

    <?php if(!empty($_SESSION['flashSuccessMessage'])):?>
        <p class="successMessage"><?= $_SESSION['flashSuccessMessage']?></p><br>
        <?php $_SESSION['flashSuccessMessage'] = null;?>
    <?php endif; ?>

    <form name="add-user" method="post" action="" align="center" id="add-user">
        <input type="hidden" name="form_name" value="add-user">
        <p style="padding-bottom: 15px;"><input style="border: none; border-radius: 5px; padding: 5px 5px;" type="text" name="name" placeholder="Имя"></p>
        <p style="padding-bottom: 15px; border-radius: 5px;"><input style="border: none; border-radius: 5px; padding: 5px 5px;" type="text" name="surname" placeholder="Фамилия"></p>
        <p style="padding-bottom: 15px;"><input style="border: none; border-radius: 5px; padding: 5px 5px;" type="text" name="username" placeholder="Логин"></p>
        <p style="padding-bottom: 15px;"><input style="border: none; border-radius: 5px; padding: 5px 5px;" type="password" name="password" placeholder="Пароль"></p>
        <p align="center">Роли</p>
        <p align="center"><select name="position" style="border: none;">
                <option value="0">Сотрудник</option>
                <option value="1">Руководитель</option>
                <option value="2">Администратор</option>
            </select></p>
        <p><input type="submit" style="color: white; background-color: #ada27b; border: none; padding: 5px; border-radius: 5px; cursor: pointer;" name="submit" value="Добавить"></p>
    </form>

</div>
