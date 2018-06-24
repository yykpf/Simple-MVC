<?php

#判断PHP版本
if (version_compare(PHP_VERSION, '5.6.0', '<')) die('require PHP > 5.6.0 !');

#初始化时区
date_default_timezone_set('Asia/Shanghai');

#初始化常量
define('APP_ROOT',dirname(__DIR__));
define('SITE_URL','http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'],0,-10));

#加载路由
require  '../../vendor/autoload.php';

$router = new AltoRouter();
$router->map( 'GET', '/', function() {
    //没有加载直接实例化回报文件找不到
    //需要在composr.json中添加psr自动加载
    //然后执行 composer dumpautoload
    $controllerName = 'home';
    $actionName = 'index';
    runMethod($controllerName,$actionName);
});

# 不包含参数的访问
$router->map( 'GET|POST', '/[a:controller]/[a:action]', function($controllerName,$actionName) {
    runMethod($controllerName,$actionName);
});

# 包含参数的访问
$router->map( 'GET|POST', '/[a:controller]/[a:action]/?[**:]', function($controllerName,$actionName) {
    $args = explode('/', $_SERVER['REQUEST_URI']);
    $args = array_splice($args, 3);
    runMethod($controllerName,$actionName,$args);
});

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    exit();
}

// 启动路由方法
function runMethod($controllerName,$actionName,$args = [])
{
    $controllerClass = '\app\controllers\\'.ucfirst($controllerName).'Controller';
    if (!class_exists($controllerClass))
        exit('controller '.$controllerClass.' not find');
    $controller = new $controllerClass();
    if (method_exists($controller, $actionName)) {
        $controller->$actionName(...$args);
    } else {
        exit('method '.$actionName.' no exists');
    }
}