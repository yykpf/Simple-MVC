<?php
namespace app\console\command;

use app\models\Todo;

class MigrateCommand extends CommandCommon
{

    public function __construct()
    {
        parent::__construct();
        $this->initDB();
    }

    // 执行
    public function exec()
    {
        // 初始化数据库 并根据todo模型的 properties方法生成数据库
        $todo = new Todo();
        $migrator = new \Pheasant\migrate\migrator();
        $migrator->initialize($todo::schema(),'todo');
        exit("migrate done!");
    }
}