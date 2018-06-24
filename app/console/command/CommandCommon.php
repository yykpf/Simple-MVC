<?php
namespace app\console\command;

use Pheasant;

class CommandCommon
{

    protected $configDB = [];

    public function __construct()
    {
        $this->configDB = require  APP_ROOT.'/config/db.php';
    }

    // 初始化数据库
    protected function initDB()
    {
        // configure database connection
        Pheasant::setup($this->configDB['dsn']);
    }
}