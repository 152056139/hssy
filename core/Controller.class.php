<?php
  class Controller
  {
    /**
    *加载制定模板类
    *param $page
    *param array $data
    */
    public function show($page, $data=array()){
      $url = "app/views/".$page.".php";
      //判断页面是否存在
      if(file_exists($url)){
        require_once $url;
      }
    }
  }
?>
