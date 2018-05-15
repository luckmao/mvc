<?php
/**
 * Created by PhpStorm.
 * User: luckmao
 * Date: 2015/5/12
 * Time: 下午7:06
 */
namespace core\lib;
use core\lib\conf;
class route
{
    public $controller;
    public $action;
    public function __construct()
    {
       //xxx.com/index/index
        /*
         * 1.隐藏index.php
         * 2.获取URl 参数部分
         * 3.返回对应控制器和方法
         */
        if($_SERVER['REQUEST_URI'] && $_SERVER['REQUEST_URI'] != '/' ){
            //思路 ／index/index 解析掉
            $path = $_SERVER['REQUEST_URI'] ;

            $patharr = explode('/',trim($path,'/'));
            if(isset($patharr[0])){
                $this->controller= $patharr[0];
                unset($patharr[0]);
            }
            if(isset($patharr[1])){
                $this->action = $patharr[1];
                unset($patharr[1]);
            }else{
                $this->action = conf::get('ACTION','route');
            }
            $count = count($patharr) + 2;
            $i = 2;
            //计算 参数 数量 然后 把 建和值 对应成数组 用while 来实现  （index/index/id/1/order/2 此处处理控制器和方法之后的参数)
            while ($i < $count){
                if(isset($patharr[$i + 1])){
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i = $i +2;
            }
          //  p($_GET);

        }else{
            $this->action=conf::get('action','route');
            $this->controller=conf::get('controller','route');
        }
    }
}