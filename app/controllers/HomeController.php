<?php
namespace app\controllers;

/**
 * home控制器
 */
class HomeController extends BaseController
{

    // 公共文件
    public function index()
    {
        $this->render('home/index');
    }
}