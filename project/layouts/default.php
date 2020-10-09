<?php

use Project\Assets\Functions;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
    <script type="text/javascript" src="/project/assets/jquery-3.5.1.min.js"></script>

<!--    <link rel="stylesheet" type="text/css" href="/project/style/style.css?3" />-->


    <!-- Bootstrap core CSS -->
    <link href="/project/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/project/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="/project/style/theme.css" rel="stylesheet">-->


    <title><?=$title;?></title>
</head>

<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                if(Functions::isLogin()):
                ?>
                    <li><a href="/users/">Главная</a></li>
                <?php if((Functions::getUser()['id_position'] == 0)||(Functions::getUser()['id_position'] == 1)):?>
                    <li><a href="/users/edit">Редактировать</a></li>
                <?php endif;?>

                <?php if(Functions::getUser()['id_position'] == 2):?>
                    <li><a href="/users/all-users">Все пользователи</a></li>
                    <li><a href="/users/reg">Добавить пользователя</a></li>
                <?php endif;?>
                    <li><a href="/users/logout">Выход</a></li>
                <?php
                else:
                ?>
                <li><a href="/login">Вход</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>
    <div class="container theme-showcase" role="main">
        <div class="jumbotron">
            <p style="padding-top: 5px;"><?=$title;?></p>
            <div align="center">
                <?=$content;?>
            </div>

        </div>



    </div>
</body>
</html>