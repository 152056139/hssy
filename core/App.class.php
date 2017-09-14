<?php

class App
{
  protected static $controller = 'Home';
  protected static $method = 'index';
  protected static $pams = array();

  /**
    * url重写路由的url地址解析方法
    */
  public static function paseUrl() {
    if(isset($_GET['url'])){
      $url = explode('/',$_GET['url']);
      //得到控制器
      if(isset($url[0])){
        self::$controller = $url[0];
        unset($url[0]);
      }
      //得到方法名
      if(isset($url[1])){
        self::$method = $url[1];
        unset($url[1]);
      }
      //判断是否还有其他参数
      if(isset($url)){
        self::$pams = array_values($url);
      }
    }
  }


  /**
    *项目入口方法
    *@throw Excetpion
    */
  public static function run() {
    self::paseUrl();

    //判断控制器的路径
    if (App == 'app') {
      $url = 'app/controllers/'.self::$controller.'.class.php';
    }
    if (App == 'admin') {
      $url = 'admin/controllers/'.self::$controller.'.class.php';
    }
    //判断控制器文件是否存在
    if(file_exists($url)) {
      $c = new self::$controller;
    } else {
      throw new MyException('控制器不存在');

    }

    //执行方法
    if(method_exists($c,self::$method)) {
      $m = self::$method;
      $new_pams = array();
      $num = count(self::$pams);

      //传递参数，判断是否有参数
      if($num > 0){
        //判断传递的参数是否是2的倍数
        if($num % 2 == 0){
          for($i=0;$i<$num;$i+=2){
            $new_pams[self::$pams[$i]] = self::$pams[$i+1];
          }
        } else {
          throw new MyExcetpion('非法参数');
        }
      }
      $c->$m($new_pams);
    } else {
      throw new MyException('方法不存在');
    }
  }

  /**
   * 自动加载类方法
   * @param $className
   * @throws Exception
   */
  public static function myAutoloader($className){
    if (App == 'app'){
      //控制器类文件目录
      $controller = 'app/controllers/'.$className.'.class.php';
      //模块类文件目录
      $model = 'app/models/'.$className.'.class.php';
      //核心类文件目录
      $core = 'core/'.$className.'.class.php';
    }
    if (App == 'admin'){
      $controller = 'admin/controllers/'.$className.'.class.php';
      //模块类文件目录
      $model = 'admin/models/'.$className.'.class.php';
      //核心类文件目录
      $core = 'core/'.$className.'.class.php';
    }


    if (file_exists($controller)){
      require_once $controller;
    } else if (file_exists($model)) {
      require_once $model;
    } else if (file_exists($core)) {
      require_once ($core);
    } else {
      throw new MyException('类文件不存在');
    }
  }
}
