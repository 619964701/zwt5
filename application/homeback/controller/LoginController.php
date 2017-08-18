<?php
namespace app\homeback\controller;
use think\Controller;
use think\Request;
use app\homeback\model\Admin;
use think\Session;

class LoginController extends Controller{
    /**
     * 登录的首页
     * @return mixed
     */
    function index(){
        if(Request::instance()->isAjax()){
            $adminname = input('post.adminname');
            $password = input('post.password');
            $verify =input('post.verify');
            if($adminname==""){
                return json(['txt'=>'管理员的不得为空']) ;
            }else{
                if($password==""){
                    return json(['txt'=>'密码不得为空！']) ;
                }else{
                    if($verify==""){
                        return json(['txt'=>'验证码不得为空！']) ;
                    }else{
                        $captcha = new \think\captcha\Captcha();
                        $admin =new Admin();
                        $data = $admin->selectadmin($adminname);
                        if($data['password']==md5($password) && $captcha->check($_POST['verify'])){
                            Session::set('adminname',$adminname);
                            Session::set('nickname',$data['nickname']);
                            Session::set('adminId',$data['id']);
                            $time =['last_login'=>date('Y-m-d H:i:s')] ;
                            $admin->save($time,['id'=>$data['id']]);
                            return json(['flag'=>'成功']) ;
                            
                        }else{
                            if(!$data){
                                return json(['txt'=>'管理员不存在']) ;
                            }elseif($data['password']!=md5($password)){
                                return json(['txt'=>'管理员密码不正确']) ;
                            }elseif(!$captcha->check($verify)){
                                return json(['txt'=>'验证码不正确！']) ;
                            }
                        }
                    }
                }
            }
        }else{
            return $this->fetch();
        }
    }
    
    public function logout(){
        //连文件都销毁掉
        Session::clear();
        //$this->redirect($url);
        $this->success('退出成功','Login/index');
    }
}//类的结尾符