<?php
  class MyException extends Exception
  {
    public function showError($msg){
      $err_dir = 'app/views/errors/error.php';
      //判断错误页面是否存在
      if(file_exists($err_dir)){
        require_once $err_dir;
      }
    }
  }
 ?>
