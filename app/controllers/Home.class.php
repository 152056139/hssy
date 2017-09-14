<?php
  class Home extends Controller
  {
    public function index($data = array())
    {
      echo "这里是home控制器里的index方法";
      //加载首页页面
      $this->show('index/index', $data);
    }
  }
