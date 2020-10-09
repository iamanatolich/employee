<form action="" name="date" id="date" method="post">
    <input type="hidden" name="form_name" value="date">
    Период с: <input type="date" name="datain" value="<?= $_POST['datain'] ?>"> по <input type="date" name="dataout" value="<?= $_POST['dataout'] ?>">
    <p style="padding-top: 5px;"><input name="submit" type="submit" value="Вывести график" style="color: white; background-color: #ada27b; border: none; padding: 5px; border-radius: 5px; cursor: pointer;" id="justbutton"></p>
    <div id="sms"></div>
</form>
<br>
<?php if(!empty($_SESSION['flashErrorMessage'])):?>
    <p class="errorMessage"><?= $_SESSION['flashErrorMessage']?></p><br>
    <?php $_SESSION['flashErrorMessage'] = null;?>
<?php endif;?>



<?php if(!empty($holiday)):?>
    <script type="text/javascript" src="/project/assets/tab.js?6"></script>
    <form action="/vacation/checkbox" method="post" name="checkbox" id="checkbox">
        <input type="hidden" name="form_name" value="checkbox">
        <table border="1" width="100%">
            <tr>
                <th class="text-center">Имя фамилия</th>
                <?php if((\Project\Assets\Functions::getUser()['id_position']) === 0): ?>
                    <a onclick="openWin2(this)" href="#&amp;id=<?= \Project\Assets\Functions::getUser()['id']?>&amp;datain=<?= $_POST['datain'] ?>&amp;dataout=<?= $_POST['dataout'] ?>#end">Добавить отпуск</a><br><br>
                <?php endif; ?>
                <th class="text-center">С</th>
                <th class="text-center">По</th>
                <th class="text-center">Согласование даты проведения аттестации</th>
                <?php if((\Project\Assets\Functions::getUser()['id_position']) == "1"): ?>
                    <th class="text-center">
                        <input type="submit" name="formSubmit" value="Записать"  style="color: white; background-color: #ada27b; border: none; padding: 5px; border-radius: 5px; cursor: pointer;"/></th>
                    <th style="display:none;">Id Пользователя</th>
                <?php endif; ?>
            </tr>
            <?php foreach($holiday as $holidays): ?>
                <tr align="center">
                    <td><?= $holidays['name'] ?> <?= $holidays['surname'] ?></td>
                    <td><?=date("d.m.Y",strtotime($holidays['date_in']));?></td>
                    <td><?= $holidays['date_out'] ?></td>


                    <?php if($holidays['approved'] == 0): ?>
                        <td>Не согласован</td>
                    <?php else: ?>
                        <td>Согласован</td>
                    <?php endif; ?>

                    <?php if(\Project\Assets\Functions::getUser()['id_position'] == "1" && $holidays['approved'] == 0): ?>
                        <td>
                            <input type="checkbox" name="iduser[]" value="<?= $holidays['id_user'] ?>,<?= $holidays['date_in'] ?>,<?= $holidays['date_out'] ?>">
                        </td>
                    <?php else: ?>
                        <?php if(\Project\Assets\Functions::getUser()['id_position'] == "1"): ?>
                            <td></td>
                        <?php endif; ?>

                    <?php endif; ?>


                </tr>
            <?php endforeach;?>
        </table>
    </form>
<?php elseif(($_SERVER['REQUEST_METHOD'] == 'POST') && (empty($holiday))): ?>
    <?php if((\Project\Assets\Functions::getUser()['id_position']) === "1"): ?>
        Нет записей
    <?php endif; ?>
    <script type="text/javascript" src="/project/assets/tab.js?6"></script>
    <a onclick="openWin2(this)" href="#&amp;id=<?= \Project\Assets\Functions::getUser()['id']?>&amp;datain=<?= $_POST['datain'] ?>&amp;dataout=<?= $_POST['dataout'] ?>#end" > Добавить отпуск</a>
    <br><br>Нет записей
<?php endif; ?>
<?php if(!empty($_SESSION['flashSuccessMessage'])):?>
    <p class="successMessage"><?= $_SESSION['flashSuccessMessage']?></p><br>
    <?php $_SESSION['flashSuccessMessage'] = null;?>
<?php endif; ?>