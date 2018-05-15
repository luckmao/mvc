<?php
/**
 * Created by PhpStorm.
 * User: luckmao
 * Date: 2016/5/12
 * Time: 下午11:53
 */
namespace core\lib;
class conf
{
    static public $conf = [];
    static public function get($name,$file)
    {

        /*
         * 1.判断配置文件是否存在
         * 2.判断对应配置是否存在
         * 3.缓存配置
         */
        if(isset(self::$conf[$file])){
            //为什么要做这个 缓存呢
            //因为 每一次请求 （就一次都脚本里边）可能都存在 好多次调用 config 信息都 呢么这个静态变量第一次就给值 后续用都时候就可以拿来用了

            if (!isset(self::$conf[$file][$name])) {
                exit('没有这个配置项  '.$name);
            }
            return self::$conf[$file][$name];
        }else {
            $path = LUCK . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    exit('没有这个配置项');
                }
            } else {
                exit('找不到配置文件');
            }
        }
    }

    static public function all($file)
    {
        if(isset(self::$conf[$file])){
            //为什么要做这个 缓存呢
            //因为 每一次请求 （就一次都脚本里边）可能都存在 好多次调用 config 信息都 呢么这个静态变量第一次就给值 后续用都时候就可以拿来用了
            return self::$conf[$file];
        }else {
            $path = LUCK . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            } else {
                exit('找不到配置文件');
            }
        }
    }
}