<?php
namespace app\homeback\controller;
use app\homeback\behavior\AuthController;
use think\Request;
use think\Db;
use think\Session;
use think\Loader;

class NavController extends AuthController{
    function index(){
        $data =  Db::name('nav')->select(); 
        $list=array();
        foreach($data as $arr){
            $list[$arr['pid']][]=$arr;//重新整理数据排序。
        }
        $this->assign("list",$list);
        return $this->fetch();
    }
    //更改导航栏
    function edit(){
        $id = input('param.id');
        $data = Db::name('nav')->where('id',$id)->find();
        $this->assign('data',$data);
        if(Request::instance()->isAjax()){
            $data = [
                'navName'=>input('post.navName'),
                'cssName'=>input('post.cssName'),
                'htmlName'=>input('post.htmlName'),
                'desc'=>input('post.desc'),
                'id'=>input('post.id'),
                'img'=>input('post.img'),
            ];
            $validate = Loader::validate('app\homeback\validate\Nav');
            if(!$validate->scene('edit')->check($data)){
                $error = $validate->getError();
                return json(['txt'=>$error]) ;
            }else{
                $flag = Db::name('nav')->where('id', $data['id'])->update($data);
                if($flag){
                    return json(['flag'=>'成功']) ;
                }else{
                    return json(['txt'=>'更改导航栏失败']) ;
                }
            }
        }
        return $this->fetch();
    }
    //删除导航栏
    function delete(){
        $data = Db::name('nav')->where('id|pid',input('param.id'))->delete();
        if($data){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
    //增加导航栏
    function add(){
        if(input('param.id')){
            $pid = input('param.id');
        }else{
            $pid = 0;
        }
        $this->assign('pid',$pid);
        return $this->fetch('add');
        
    }
    function insert(){
        if(Request::instance()->isAjax()){
            $data = [
                'navName'=>input('post.navName'),
                'cssName'=>input('post.cssName'),
                'htmlName'=>input('post.htmlName'),
                'desc'=>input('post.desc'),
                'pid'=>input('post.pid'),
                'img'=>input('post.img'),
            ];
            $validate = Loader::validate('app\homeback\validate\Nav');
            if(!$validate->check($data)){
                $error = $validate->getError();
                return json(['txt'=>$error]) ;
            }else{
                $flag = Db::name('nav')->insert($data);
                if($flag){
                    return json(['flag'=>'成功']) ;
                }else{
                    return json(['txt'=>'新增导航栏失败']) ;
                }
            }
        }
    }
}//类的结尾符