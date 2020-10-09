<?php if(!empty($_SESSION['flashErrorMessage'])):?>
    <p class="errorMessage"><?= $_SESSION['flashErrorMessage']?></p><br>
    <?php $_SESSION['flashErrorMessage'] = null;?>
<?php endif;?>
<div id="news">

    <form name="login" method="post" action="" align="center" id="login">
        <input type="hidden" name="form_name" value="login">
        <p style="padding-bottom: 5px;" align="center"></p><h2>вход</h2><p></p>
        <p style="padding-bottom: 5px;">Логин</p>
        <p style="padding-bottom: 5px;"><input type="text" name="username"></p>
        <p style="padding-bottom: 5px;">Пароль</p>
        <p style="padding-bottom: 5px;"><input type="password" name="password"></p>
        <p><input type="submit" name="submit" value="Вход"></p>
    </form>
    <br>
</div>