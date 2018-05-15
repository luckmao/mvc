<?php
/**
 * Created by PhpStorm.
 * User: luckmao
 * Date: 2015/5/12
 * Time: 下午5:48
 */

/*
 * 入口文件
 * 1.定义常量
 * 2.家在函数库
 * 3.启动框架
 *
 */
//echo  str_replace('\\','/','core\route');die;
define('LUCK',realpath('./'));
define('CORE',LUCK.'/core');
define('APP',LUCK.'/app');
define('DEBUG',true);
define('MODEL','app');
include 'vendor/autoload.php';

if(DEBUG){
    $whoops = new \Whoops\Run;
    $title = '框架出错';
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($title);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}
include CORE.'/common/function.php';
include CORE.'/luckmao.php';
spl_autoload_register('\core\luckmao::load');

\core\luckmao::run();
