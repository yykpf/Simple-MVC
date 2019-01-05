<?php
namespace app\controllers;

use Latte\Engine;
use Pheasant;

class BaseController {

    private $config;
    private $db;
    private $latte; // 模版引擎

    public function __construct()
    {
        $this->initConfig();
        $this->initDb();
        $this->initTpl();
    }

    // 初始化日志信息
    private function initConfig()
    {
        //因为配置文件
        $this->config = require APP_ROOT . '/config/base.php';
    }

    // 初始化配置文件
    private function initDb()
    {
        $this->db = require APP_ROOT . '/config/db.php';
        // configure database connection
        Pheasant::setup($this->db['dsn']);
    }

    //初始化数据库
    public function initTpl()
    {
        $this->latte = new Engine();
        $this->latte->setTempDirectory(APP_ROOT . '/storage/views');
        $set = new \Latte\Macros\MacroSet($this->latte->getCompiler());
        $set->addMacro('url', function ($node, $writer) {
            return $writer->write('echo "' . SITE_URL . '%node.args' . '"');
        });
    }

    //定义模版输出方法

    public function render($name, array $params = [], $block = null)
    {
        $params['sitename'] = 'mvc';
        $tplFile            = APP_ROOT . '/views/' . $name . '.latte';
        $this->latte->render($tplFile, $params, $block);
    }

    //定义跳转
    public function redirect($name)
    {
        header('Location:' . SITE_URL . '/' . $name);
        exit;
    }
}