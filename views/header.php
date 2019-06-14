<?php

?>
<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project "CONCERT HALL"</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="/css/material-icons.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <script src="/js/jquery-3.4.1.min.js"></script>
</head>
<body class="grey lighten-2">

<!--    HEADER-->
<header>
    <nav class="light-blue darken-4">
        <div class="nav-wrapper">
            <div class="container">
                <a class="brand-logo" href="/" title="На главную">Project "CONCERT HALL"</a>
                <ul id="nav-mobile" class="right">
                    <li><a href="<?php echo myLink('admin')?>">Admin</a></li>
                    <li <?php echo $_SESSION['is_auth'] ? 'id="account_link"' : ''; ?>><a class="account" href="<?php echo myLink('login') ?>"><i class="material-icons">account_circle</i><span><?php echo $_SESSION['is_auth'] ? $_SESSION['is_auth_name'] : 'Вход не выполнен'; ?></span></a>
                        <ul id='dropdown_account_link' class='dropdown-content'>
                            <li><a class="light-blue-text text-darken-4" href="<?php echo myLink('my-account') ?>"><i class="material-icons">account_box</i>Мой аккаунт</a></li>
                            <li><a href="index.php?page=logout" class="light-blue-text text-darken-4"><i class="material-icons">close</i>Выйти из аккаунта</a></li>
                        </ul>
                    </li>
                    <li><a><i class="material-icons">shopping_cart</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--    /HEADER-->
<!--main content-->
<div class="main">
    <div class="container">
<?php
