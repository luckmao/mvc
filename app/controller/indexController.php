<?php
/**
 * Created by PhpStorm.
 * User: luckmao
 * Date: 2016/5/12
 * Time: 下午10:24
 */
namespace app\controller;

use core\lib\model;

class indexController extends \core\luckmao
{
    public function index()
    {
//        p('it is index');
////        $model = new \core\lib\model();
////        $sql = 'select * from t1';
////        $res = $model->query($sql);
////        p($res->fetchAll());
//        $data = 'hell word';
//        $this->assign('data',$data);
//        $this->display('index.html');
//        $temp = \core\lib\conf::all('db');
//        $a = \core\lib\conf::get('action','route');
//        p($a);
//        p($temp) ;
//        $model = new \app\model\t1Model();
//        $a = $model->list();
//        dump($a);
         $data = 'ceshi';
        $this->assign('data',$data);
        $this->display('ceshi.html');

    }
}