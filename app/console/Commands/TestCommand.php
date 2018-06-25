<?php
namespace app\console\Commands;

use Inhere\Console\Command;

/**
 * Class TestCommand
 *
 * @package app\console\commands
 */
class TestCommand extends Command {

    // 命令名称 不能重复
    protected static $name = 'console-test';
    // 命令描述
    protected static $description = 'this is a test independent command';

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
        $output->write('hello, this in ' . __METHOD__);
    }
}