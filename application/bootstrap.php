<?php
session_start();
//первые 3 строки будут подключать файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
//Последние строки подключают файл с классом маршрутизатора и запускают его на выполнение вызовом статического метода start.
require_once 'core/route.php';
Route::start(); //запускаем маршрутизатор
?>