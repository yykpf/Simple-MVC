<?php
/**
 * 引入命令
 */
// 手动注册太麻烦！ 可以配置命名空间和对应的路径来，将会自动扫描并注册命令。
// 独立命令
$app->registerCommands('app\\console\\Commands', dirname(__DIR__) . '/console/Commands');
