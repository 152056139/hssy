<?php
  class Home extends Controller
  {
    public function index($data = array())
    {
      //加载首页页面
      $this->show('index/index', $data);
    }
  }
