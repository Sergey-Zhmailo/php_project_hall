<?php
session_start();
//unset($_SESSION['errors']);
//unset($_SESSION['is_auth']);
//$_SESSION['is_auth'] = 8;
if (!empty($_GET['route'])) {
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/controllers/" . $_GET['route'] . ".php";
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$connect = new mysqli(HOST, USER, PASSWORD, DATABASE);
/* Connection check */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$connect->set_charset('utf8');
require_once $_SERVER['DOCUMENT_ROOT'] . "/system/request.php";
$auth = new Auth;
if ($_GET['page'] == 'logout') {
    unset($_SESSION['is_auth']);
    unset($_SESSION['is_auth_name']);
    unset($_SESSION["is_auth_email"]);
    header('Location: /', true, 301);
    exit();
}

if ($_SERVER['REQUEST_URI'] == '/') {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/home.php";
} elseif (!empty($filename) && file_exists($filename)) {
    require_once $filename;
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/404.php";
}