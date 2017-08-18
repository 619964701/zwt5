<?php
namespace app\homeback\controller;
use app\homeback\behavior\AuthController;
use think\Db;

class LunboController extends AuthController{
    //轮播图首页
    function index(){
        $data = Db::name('lunbo')->select();
        $this->assign('data',$data);
        return $this->fetch();
    } 
    
    //增加轮播图
    function add(){
        if(request()->isPost()){
            if($_FILES['img']['name']){
                $file = request()->file('img');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS.'/static/uploads');
                if($info){
                    $img = '/static/uploads/'.date('Ymd').'/'.$info->getFilename();
                    $data = [
                        'img'=>$img,
                    ];
                    $db = Db::name('lunbo')->insert($data);
                    if($db){
                        return $this->success('添加轮播图片成功！','lunbo/index');
                    }else{
                        return $this->error('添加轮播图失败！');
                    }
                }else{
                    // 上传失败获取错误信息
                    return $this->error($file->getError());
                }
            }  
        }
        return $this->fetch();
    }
}