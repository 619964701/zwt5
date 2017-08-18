<?php
namespace app\homeback\controller;
use think\Loader;
use think\Db;
use app\homeback\behavior\AuthController;
//后台
class YouqingController extends AuthController{

    //后台首页
    function index(){    
        $lianxi = Db::name('lianxi')->select();
        $this->assign('data',$lianxi);
        return $this->fetch();
        
    }
    function add(){
        return $this->fetch();
    }
    function insert(){
        if(request()->isPost()){
            $data = [
                'title'=>input('title'),
                'url'=>input('url'),
            ];
            if($_FILES['img']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('img');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                if($info){
                    $data['img'] = '/static/uploads/'.date('Ymd').'/'.$info->getFilename();
                }else{
                    // 上传失败获取错误信息
                    return $this->error($file->getError());
                }
            }else{
                return $this->error('你没有上传任何图片');
            }
            $validate = Loader::validate('app\homeback\validate\Youqing');
            if($validate->check($data)){
                $db = Db::name('youqing')->insert($data);
                if($db){
                    return $this->success('添加友情链接成功','youqing/index');
                }else{
                    return $this->error('添加友情链接失败！');
                }
            }else{
                return $this->error($validate->getError());
            }
        }
    }
    ///修改友情链接
    function edit(){
        $data = Db::name('youqing')->find(input('param.id'));
        if(request()->isPost()){
            if($_FILES['img']['tmp_name']){
                unlink(ROOT_PATH . 'public' . DS .$data['img']);
                $file = request()->file('img');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                if($info){
                    $data['img'] = '/static/uploads/'.date('Ymd').'/'.$info->getFilename();
                }else{
                    // 上传失败获取错误信息
                    return $this->error($file->getError());
                }
            }
            $data['title']=input('title');
            $data['url']=input('url');
            $data['id']=input('id');
            $validate = Loader::validate('app\homeback\validate\Youqing');
            if($validate->check($data)){
                $db = Db::name('youqing')->update($data);
                if($db){
                    return $this->success('修改友情链接成功','youqing/index');
                }else{
                    return $this->error('修改友情链接失败！');
                }
            }else{
                return $this->error($validate->getError());
            }
            $data = [
                'title'=>input('title'),
                'url'=>input('url'),
            ];
        }
        $this->assign('data',$data);
        return $this->fetch();
    }
    ///删除友情链接
    function delete(){
        if(input('param.id')){
            $data = Db::name('youqing')->find(input('param.id'));
            $db = Db::name('youqing')->delete(input('param.id'));
            if($db){
                unlink(ROOT_PATH . 'public' . DS .$data['img']);
                return $this->success('删除友情链接成功','youqing/index');
            }else{
                return $this->error('删除友情链接失败！');
            }
        }else{
            return $this->error('删除的友情链接失败！');
        }
    }
    
}//类的结尾符
