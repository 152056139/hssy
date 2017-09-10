<?php
echo "<meta chartset='utf-8'>";
require_once 'app/controllers/Home.class.php';
require_once 'app/controllers/Test.class.php';

//接受两个参数 controller控制器名称 method控制器中的方法名称
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$method = isset($_GET['method']) ? $_GET['method'] : 'index';

//加载指定控制器中的制定方法
//实例化控制器类
$c = new $controller;

//调用控制器中的方法
$c->$method();
