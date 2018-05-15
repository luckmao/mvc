<?php
/**
 * Created by PhpStorm.
 * User: luckmao
 * Date: 2018/5/15
 * Time: 下午4:36
 */
namespace app\model;
class t1Model extends \core\lib\model{
    public  $table = 't1';
    public function list()
    {
        $res = $this->select($this->table,'*');
        return $res;
    }
}