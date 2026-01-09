<?php
session_start();
require_once 'app/Models.php';
require_once 'app/Controllers.php';


if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'kendaraan/list';
$params = explode('/', $url);

$controller = new KendaraanController();
$data = $controller->index(); 

include 'views/layout/header.php';

if ($params[0] == 'admin') {
    if (isset($params[1]) && $params[1] == 'edit') {
        include 'views/admin/Edit.php';
    } else {
        include 'views/admin/CRUD admin.php';
    }
} elseif ($params[0] == 'kendaraan') {
    if (isset($params[1]) && $params[1] == 'detail') {
        include 'views/kendaraan/Detail.php';
    } else {
        include 'views/kendaraan/List.php';
    }
} else {
    include 'views/kendaraan/List.php';
}

include 'views/layout/footer.php';