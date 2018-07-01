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
        log_write('测试',[11,22]);

        $this->render('home/index');
    }
}