<?php
namespace app\homeback\controller;
use think\Request;
use app\homeback\model\Admin;
use think\Loader;
use app\homeback\behavior\AuthController;
//后台
class IndexController extends AuthController{

    //后台首页
    function index(){      
        return $this->fetch();
        
    }
    //管理员列表
    function admin_list(){
         $adminlist = new Admin();
         $pageParam    = ['query' =>[]];
         if(Request::instance()->isGet()){
             $type = input('get.type');
             $keywords = input('get.keywords');
             if ('adminname'==$type) {
                 $adminlist->where('adminname', 'like', "%{$keywords}%");
             }
             if ('nickname'==$type) {
                 $adminlist->where('nickname', 'like', "%{$keywords}%");
             }
             $pageParam['query']['keywords'] = $keywords;
             $pageParam['query']['type'] = $type;
         }
         $data =$adminlist->paginate(3,false,$pageParam);
         $page = $data->render();
         $this->assign('adminlist',$data);
         $this->assign('page',$page);
         return $this->fetch();
    }
    //新增创建管理员
    function add(){
        return $this->fetch();
    }
    function insert(){
        if(Request::instance()->isAjax()){
            if(input('post.password')==input('post.confirmPwd')){
                $data = [
                    'adminname'=>input('post.adminname'),
                    'password'=>input('post.password'),
                    'nickname'=>input('post.nickname'),
                    'active'=>input('post.active'),
                ];
                $validate = Loader::validate('app\homeback\validate\Admin');
                if(!$validate->check($data)){
                    $error = $validate->getError();
                    return json(['txt'=>$error]) ;
                }else{
                    //创建管理员模型
                    $admin = new Admin();
                    $data['password'] = md5(input('post.password'));
                    $admin->data($data);
                    $flag = $admin->save();
                    if($flag){
                        return json(['flag'=>'成功']) ;
                    }else{
                        return json(['txt'=>'新增管理员失败']) ;
                    }
                }
            }else{
                return json(['txt'=>'两次密码不一致！']) ;
            } 
        }else{
            return $this->fetch('add');
        }
    }
    
    //编辑修改管理员
    function edit(){
        if(Request::instance()->isGet()){
            $id =input('param.id');
            if(!empty($id)){
                $data = Admin::get($id);//动态查询，根据ID
                $this->assign('data',$data);
            }else{
                $this->error('请选择编辑用户！','index/admin_list');
            }
        }
        return $this->fetch();
    }
    function update(){
        if(Request::instance()->isAjax()){
            $data = [
                'adminname'=>input('post.adminname'),
                'password'=>input('post.password'),
                'nickname'=>input('post.nickname'),
                'active'=>input('post.active'),
            ];
            //创建管理员模型
            $admin = new Admin();
            $where = [
                'adminname'=>['=',input('post.adminname')],
                'id'=>['<>',input('post.id')]
            ];
            $num = $admin->where($where)->count();
            if($num==0){
                $validate = Loader::validate('app\homeback\validate\Admin');
                if(!$validate->scene('edit')->check($data)){
                    $error = $validate->getError();
                    return json(['txt'=>$error]) ;
                }else{
                    if(input('post.password')!=input('post.hiddenPwd')){
                        $data['password'] = md5(input('post.password'));
                    }
                    if(input('post.password')==input('post.confirmPwd')){
                        $flag = $admin->save($data,['id'=>input('post.id')]);
                        if($flag){
                            return json(['flag'=>'成功']) ;
                        }else{
                            return json(['txt'=>'没有做任何更改！']) ;
                        }
                    }else{
                        return json(['txt'=>'两次密码不一致！']) ;
                    }
                } 
            }else{
                return json(['txt'=>'管理员账户已存在']) ;
            }
        }
    }

    //删除管理员操作
    function delete(){
        $deleteid = input('param.selectbox/a');
        if(!empty($deleteid)&&is_array($deleteid)){
            $id = implode(',', $deleteid);
            $flag = Admin::destroy($id);
            if(false != $flag){
                $this->success('删除成功','index/admin_list');
            }else{
                $this->error('删除失败','index/admin_list');
            }
        }else {
           $this->error('删除失败,请重新选择','index/admin_list');
        }

    }
    function jumperror(){
        return $this->fetch();
    }
}//类的结尾符
