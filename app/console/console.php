<?php

use Inhere\Console\IO\Input;
use Inhere\Console\IO\Output;

# 判断访问来源
if (php_sapi_name() !== 'cli') {
    exit('need cli environment !');
}

# 定义全局常量
define('APP_ROOT',dirname(__DIR__));

# 引入自动加载
require  '../../vendor/autoload.php';

$meta   = [
    'name'    => 'My Console App',
    'version' => '1.0.2',
];
$input  = new Input;
$output = new Output;
// 通常无需传入 $input $output ，会自动创建
$app = new \Inhere\Console\Application($meta, $input, $output);

// add command routes
$app->command('demo', function (Input $in, Output $out) {
    $cmd = $in->getCommand();

    $out->info('hello, this is a test command: ' . $cmd);
});

require __DIR__ . '/commands.php';
// run
$app->run();
