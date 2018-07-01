<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// 记录日志
function log_write(string $title,array $data,$log_level = Logger::DEBUG)
{
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler(APP_ROOT.'/logs/'.date('Y-m-d').'.log', $log_level));

    // add records to the log
    $log->debug($title,$data);
}