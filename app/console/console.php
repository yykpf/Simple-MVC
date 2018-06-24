<?php

# 判断访问来源
if (php_sapi_name() !== 'cli')
    exit('nedd cli environment !');

#获取参数，第一为控制器，第二个为方法，第0个为调用的文件路径
$c = $argv[1];

# 定义全局常量
define('APP_ROOT',dirname(__DIR__));

# 引入自动加载
require  '../../vendor/autoload.php';

# 命令行路径
$commandClass = '\app\console\command\\'.ucfirst($c).'Command';

// 判断文件是否存在
if (!class_exists($commandClass))
    exit('command '.$commandClass.' not find');

//实例化类
$controller = new $commandClass();

//调用exec默认方法
$controller->exec();