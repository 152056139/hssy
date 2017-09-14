<?php
echo "<meta chartset='utf-8'";
require_once '/core/App.class.php'
//注册一个
define ('App', 'admin');
spl_autoload_register(array('App', 'myAutoloader'));

try {
  App:run();
} catch (MyException $e) {
  $e->showError(($e->getMessage()));
}
