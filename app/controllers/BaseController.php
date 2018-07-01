<?php
namespace app\controllers;

use Pheasant;
use Latte\Engine;

class BaseController
{
    private $config;
    private $configDb;
    private $latte; // 模版引擎

    public function __construct()
    {
        $this->initConfig();
        $this->initDb();
        $this->initTpl();
        $this->initLog();
    }
    // 初始化日志信息
    private function initLog()
    {
        require  APP_ROOT.'/common/functions.php';
    }
    // 初始化配置文件
    private function initConfig()
    {
        //因为配置文件
        $this->config = require  APP_ROOT.'/config/base.php';
    }
    //初始化数据库
    private function initDb()
    {
        $this->configDB = require  APP_ROOT.'/config/db.php';
        // configure database connection
        Pheasant::setup($this->configDB['dsn']);
    }
    //定义模版输出方法
    public function render($name,array $params = [], $block = NULL)
    {
        $params['sitename'] = 'mvc';
        $tplFile = APP_ROOT.'/views/'.$name.'.latte';
        $this->latte->render($tplFile,$params,$block);
    }

    //定义跳转
    public function redirect($name)
    {
        header('Location:'.SITE_URL.'/'.$name);
        exit;
    }

    // 初始化模版
    public function initTpl()
    {
        $this->latte = new Engine();
        $this->latte->setTempDirectory(APP_ROOT . '/storage/views');
        $set = new \Latte\Macros\MacroSet($this->latte->getCompiler());
        $set->addMacro('url', function ($node, $writer) {
            return $writer->write('echo "' . SITE_URL . '%node.args' . '"');
        });
    }
}