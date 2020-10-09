<div align="center">
    <?php if(!empty($_SESSION['flashErrorMessage'])):?>
        <p class="errorMessage"><?= $_SESSION['flashErrorMessage']?></p><br>
        <?php $_SESSION['flashErrorMessage'] = null;?>
    <?php endif; ?>
    <form action="/vacation/add/?date" name="date" id="date" method="post">
        <input type="hidden" name="form_name" value="date">
        Период с: <input type="date" name="datain" value="<?= $_GET['datain'] ?>"> по <input type="date" name="dataout" value="<?= $_GET['dataout'] ?>">
        <p style="padding-top: 5px;"><input name="submit" type="submit" value="Записать отпуск" style="color: white; background-color: #ada27b; border: none; padding: 5px; border-radius: 5px; cursor: pointer;"></p>
        <?php if(!empty($_SESSION['flashSuccessMessage'])):?>
            <p class="successMessage"><?= $_SESSION['flashSuccessMessage']?></p><br>
            <?php $_SESSION['flashSuccessMessage'] = null;?>
        <?php endif; ?>
    </form>
</div>