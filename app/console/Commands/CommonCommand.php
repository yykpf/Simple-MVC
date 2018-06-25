<?php
namespace app\console\Commands;

use Inhere\Console\Command;
use Pheasant;

/**
 * Class CommonCommand
 *
 * @package app\console\commands
 */
class CommonCommand extends Command {

    // 命令名称 不能重复
    protected static $name = 'console-common';
    // 命令描述
    protected static $description = 'this is a common independent command';

    protected $configDB = [];

    /**
     * execute
     *
     * @author YangYang <yangyang@iwork365.com>
     *
     * @date   2018-06-25
     *
     * @param \Inhere\Console\IO\Input  $input
     * @param \Inhere\Console\IO\Output $output
     */
    public function execute($input, $output)
    {
    }

    // 初始化数据库
    protected function initDB()
    {
        $this->configDB = require  APP_ROOT.'/config/db.php';
        // configure database connection
        Pheasant::setup($this->configDB['dsn']);
    }
}