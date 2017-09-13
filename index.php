<?php
echo "<meta chartset='utf-8'>";

require_once 'core/App.class.php';
<<<<<<< HEAD
=======

>>>>>>> 6af58940a7575e74ec23b20c6e4c4fa1ec8b1405
spl_autoload_register(array('App','myAutoloader'));

try {
  App::run();
<<<<<<< HEAD
} catch(MyException $e) {
  $e->showError(($e->getMessage()));
=======
  throw new Exception();
} catch(Exception $e) {
  echo $e->getMessage();
>>>>>>> 6af58940a7575e74ec23b20c6e4c4fa1ec8b1405
}

/*

//接受两个参数 controller控制器名称 method控制器中的方法名称
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$method = isset($_GET['method']) ? $_GET['method'] : 'index';

//加载指定控制器中的制定方法
//实例化控制器类
$c = new $controller;

//调用控制器中的方法
$c->$method();
*/
