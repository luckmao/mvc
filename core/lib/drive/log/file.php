<?php
/**
 * Created by PhpStorm.
 * User: luckmao
 * Date: 2015/5/13
 * Time: 上午3:40
 */

//文件
namespace core\lib\drive\log;
use core\lib\conf;

class file
{
    public $path ;
    //构造方法是类中的一个特殊方法。当使用 new 操作符创建一个类的实例时，构造方法将会自动调用，其名称必须是 __construct() 。
    public function __construct()
    {
         $conf = conf::get('OPTION','log');
         $this->path = $conf['PATH'];
    }

    public function log($message,$file= 'log'){
        /*
         *
         * 1 判断储存文件位置是否存在
         * 否则新建
         * 2 写入日志
         *
         */
        if(!is_dir($this->path.date('YmdH'))){
            mkdir($this->path.date('YmdH'),0777,true);
        }
        return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',date('Y-m-d H:i:s') .json_encode($message).PHP_EOL,FILE_APPEND);

    }
}