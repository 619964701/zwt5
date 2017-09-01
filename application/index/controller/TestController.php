<?php 
namespace app\index\controller;
use \think\Db;
use think\cache\driver\Redis;

class TestController{
    /**
     * 
     */
    public function index(){
        $Redis = new Redis();
        dump($Redis);
        $Redis->set("testee","hello，world");
        echo $Redis->get("testee");
        for($i=0;$i<10;$i++){
            
        }
        echo $i;
    }
}
