<?php
/**
 * Created by PhpStorm.
 * User: luckmao
 * Date: 2015/5/12
 * Time: 下午6:48
 */
namespace core;
class luckmao
{
    public static $classMap = array();
    public $assign;

    static public function run()
    {
        // p(self::$classMap);die;
        \core\lib\log::init();
//        \core\lib\log::log('test','ss');
        $route = new \core\lib\route();
        $controller = $route->controller;
        $action = $route->action;
        $controfile = APP . '/controller/' . $controller . 'Controller.php';
        $controclass = '\\' . MODEL . '\controller\\' . $controller . 'Controller';

        if (is_file($controfile)) {
            include $controfile;
            $cro = new $controclass;
            $cro->$action();
            \core\lib\log::log('controller:'.$controller.'    '.'atction:'.$action);
        } else {
            throw new \Exception('找不到控制器' . $controclass);
        }
        // p($route);die;
    }

    static public function load($class)
    {
        //自动加载累哭
        //new \core\route();
        //$class = '\core\route';
        //LUCK.'/core/route.php';
        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = LUCK . '/' . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name="",$val="")
    {
        $this->assign[$name] = $val;
    }

    public function display($file)
    {
        $files = APP.'/views/'.$file;
        if(is_file($files)){
            \Twig_Autoloader::register();

            $loader = new \Twig_Loader_Filesystem(APP.'/views/');
            $twig = new \Twig_Environment($loader, array(
                'cache' => LUCK.'/runtime',
                'debug'=>DEBUG
            ));
            $template = $twig->loadTemplate($file);
            $template->display($this->assign?$this->assign:'');
        }
    }
}