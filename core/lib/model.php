<?php
/**
 * Created by PhpStorm.
 * User: luckmao
 * Date: 2016/5/12
 * Time: 下午11:11
 */
namespace core\lib;
use core\lib\conf;
class model extends \Medoo\Medoo
{
    public function __construct()
    {
        //medoo 查看官方文档进行 查看赠三钙差 方案 http://medoo.lovean.com/
        $option = conf::all('db');
        parent::__construct($option);


    }
}