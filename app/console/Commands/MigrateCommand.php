<?php
namespace app\console\Commands;

use app\models\Todo;

class MigrateCommand extends CommonCommand {

    // 命令名称 不能重复
    protected static $name = 'console-migrate';
    // 命令描述
    protected static $description = 'this is a migrate independent command';

    // 注释中的 @usage @arguments @options @example 在使用 帮助命令时，会被解析并显示出来

    /**
     * @usage usage message
     * @arguments
     *  arg     some message ...
     *
     * @options
     *  -o, --opt     some message ...
     *
     * @param  Inhere\Console\IO\Input  $input
     * @param  Inhere\Console\IO\Output $output
     *
     * @return int
     */
    public function execute($input, $output)
    {
        parent::initDB();
        // 初始化数据库 并根据todo模型的 properties方法生成数据库
        $todo     = new Todo();
        $migrator = new \Pheasant\migrate\migrator();
        $migrator->initialize($todo::schema(), 'todo');

        $output->write('migrate done!');
    }
}