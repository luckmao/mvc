<?php
/**
 * Created by PhpStorm.
 * User: luckmao
 * Date: 2015/5/13
 * Time: 上午3:37
 */
namespace core\lib;
use core\lib\conf;
class log
{
    static  $class;
    /*
     * 1.确定日志存储方式
     *
     * 2.写日志
     *
     */
    static public function init()
    {
        //确定储存方式
        $drive = conf::get('DRIVE','log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    static public function log($name,$file = 'log')
    {
        self::$class->log($name,$file);
    }
}