<?php
namespace app\homeback\behavior;
use think\Session;
use think\Request;
use think\Controller;
use app\extend\Auth;


class AuthController extends Controller{
    protected function _initialize(){
        $adminname = Session::get('adminname');
        $nickname= Session::get('nickname');
        $this->assign('nickname',$nickname);
        $this->assign('adminname',$adminname);
        if(!$adminname){
            $this->error('非法访问，请登录','Login/index');
        }
        //如果是超级管理员 就不要验证了 给予所有权限
        if(Session::get('adminId') == 1){
            return true;
        }
        //下面代码进行权限判断
        $auth = new Auth();
        ////////这里要更改数据库think_auth_rule 里面的权限内容  配合着think_auth_group 分组的rules字段
        if(!$auth->check(Request::instance()->module().'/'.Request::instance()->controller().'/'.Request::instance()->action(),Session::get('adminId'))){
            //session('[destroy]');//可以把服务器上面的session 删除
            $this->error('权限不够','index/jumperror');
        }
    }
}