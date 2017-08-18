<?php
namespace app\homeback\controller;
use think\Db;
use app\homeback\behavior\AuthController;
//后台
class ZhaopinController extends AuthController{

    //招聘首页
    function index(){    
        $zhaopin = Db::name('zhaopin')->select();
        $this->assign('data',$zhaopin);
        return $this->fetch();
        
    }
    //插入岗位
    function add(){
        return $this->fetch();
    }
    function insert(){
        $nav= Db::name('nav')->where('navName = "社会招聘"')->find();
        if(request()->isPost()){
            $data = [
                'zhiwei'=>input('zhiwei'),
                'bumen'=>input('bumen'),
                'renshu'=>input('renshu'),
                'didian'=>input('didian'),
                'introtext'=>input('introtext'),
                'start'=>input('start'),
                'end'=>input('end'),
                'nav_id'=>$nav['id'],
            ];
            $flag = Db::name('zhaopin')->insert($data);
            if($flag){
                $this->success('新增职位成功!','zhaopin/index');
            }else{
                $this->error('新增职位失败！');
            }
            dump($data);
        }
    }
    ///修改岗位
    function edit(){
        $data = Db::name('zhaopin')->find(input('param.id'));
        if(request()->isPost()){
            $data = [
                'id'=>input('param.id'),
                'zhiwei'=>input('zhiwei'),
                'bumen'=>input('bumen'),
                'renshu'=>input('renshu'),
                'didian'=>input('didian'),
                'introtext'=>input('introtext'),
                'start'=>input('start'),
                'end'=>input('end'),
            ];
            $db = Db::name('zhaopin')->update($data);
            if($db){
                return $this->success('修改职位成功','zhaopin/index');
            }else{
                return $this->error('修改职位失败！');
            }
        }else{
            $this->assign('data',$data);
            return $this->fetch();
        }
    }
    ///删除友情链接
    function delete(){
        if(input('param.id')){
            $db = Db::name('zhaopin')->delete(input('param.id'));
            if($db){
                return $this->success('删除职位成功','zhaopin/index');
            }else{
                return $this->error('删除职位失败！');
            }
        }else{
            return $this->error('删除职位失败！');
        }
    }
    
}//类的结尾符
