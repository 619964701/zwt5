<?php
namespace app\index\controller;
use think\Db;
use think\Controller;

class IndexController extends Controller{
    public function index(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        ///查询出 要显示的文章数据
        $news = Db::name('nav')->where('pid','=',38)->select();
        foreach ($news as $vo){
            $newarr[]=$vo['id'];
        }
        ///显示单独的最新一条
        $newest =  Db::name('article')->field('id,title,yinxu,created')->where('nav_id','in',$newarr)->order('created desc')->find();
        $ri = substr($newest['created'], 8,2);
        $nian = substr($newest['created'], 0,4);
        $yue = substr($newest['created'], 5,2);
        $this->assign('ri',$ri);
        $this->assign('ny',$nian.'/'.$yue);
        $this->assign('newest',$newest);
        ///显示4条新闻
        $newslist =  Db::name('article')->field('id,title,yinxu,created')->where('nav_id','in',$newarr)->order('created desc')->limit(4)->select();
        $this->assign('newslist',$newslist);
        
        ///显示集团项目 集团产业的小导航
        $jituan = Db::name('nav')->where('pid','=',7)->select();
        $this->assign('jituan',$jituan);
        return $this->fetch();
    }
    //导航栏数据
    public function nav(){
        $data =  Db::name('nav')->select();
        return $tree = $this->getTree($data,0);
    }
    ///递归树状图
    function getTree($data, $pid){
        $tree = '';
        foreach($data as $k => $v){
            if($v['pid'] == $pid){
                //父亲找到儿子         
                $v['son'] = $this->getTree($data, $v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }
    ///集团介绍
    function introduction(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        ///所在位置的获取
        if(is_numeric(input('param.id'))){
            $onenav = Db::name('nav')->where('id','=',input('param.id'))->find();
            if($onenav){
                if($onenav['pid']==0){
                    $nav_id = Db::name('nav')->where('pid','=',input('param.id'))->find();
                    $article = Db::name('article')->where('nav_id','=',$nav_id['id'])->find();
                }else{
                    $onenav = Db::name('nav')->where('id','=',$onenav['pid'])->find();
                    $article = Db::name('article')->where('nav_id','=',input('param.id'))->find();
                }
                $this->assign('onenav',$onenav);
                $this->assign('article',$article);
                return $this->fetch();
            }else{
                $this->error('请输入正确的要浏览信息！');
            }
        }else{
            $this->error('请输入正确的要浏览信息！');
        }
        
    }
    
    ///旗下公司
    public function brand(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        if(is_numeric(input('param.id'))){
            $onenav = Db::name('nav')->where('htmlName','=','brand')->find(input('param.id'));
            if($onenav){
                if($onenav['pid']==0){
                    $twonav = Db::name('nav')->where('pid','=',input('param.id'))->select();
                    foreach($twonav as $vo){
                        $twonavid[] = $vo['id'];
                    }
                    $sannav = Db::name('nav')->where('pid','in',$twonavid)->select();
                    $location = "所有领域";
                }else{
                    $location = $onenav['navName'];
                    $sannav = Db::name('nav')->where('pid','=',$onenav['id'])->select();
                    $onenav = Db::name('nav')->where('id','=',$onenav['pid'])->find();
                    $twonav = Db::name('nav')->where('pid','=',$onenav['id'])->select();
                }
                $this->assign('location',$location);
                $this->assign('onenav',$onenav);
                $this->assign('twonav',$twonav);
                $this->assign('sannav',$sannav);
                return $this->fetch();
            }else{
                $this->error('请输入正确的要浏览信息！');
            }
        }else{
            $this->error('请输入正确的要浏览信息！');
        }
    }
    
    ///集团项目 
    public function project(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        if(is_numeric(input('param.id'))){
            $onenav = Db::name('nav')->where('htmlName','=','project')->find(input('param.id'));
            if($onenav){
                if($onenav['pid']==0){
                    $twonav = Db::name('nav')->where('pid','=',input('param.id'))->select();
                    $sannav = Db::name('nav')->where('pid','in',$twonav[0]['id'])->select();
                    $location = $twonav[0];
                }else{
                    $location = $onenav;
                    $onenav = Db::name('nav')->where('id','=',$onenav['pid'])->find();
                    $twonav = Db::name('nav')->where('pid','=',$onenav['id'])->select();
                    $sannav = Db::name('nav')->where('pid','=',input('param.id'))->select();
                }
                $this->assign('location',$location);
                $this->assign('onenav',$onenav);
                $this->assign('twonav',$twonav);
                $this->assign('sannav',$sannav);
                return $this->fetch();
            }else{
                $this->error('请输入正确的要浏览信息！');
            }
        }else{
            $this->error('请输入正确的要浏览信息！');
        }
        return $this->fetch();
    }
    
    ///集团新闻
    public function news(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        if(is_numeric(input('param.id'))){
            $nav = Db::name('nav')->where('htmlName','=','news')->find(input('param.id'));
            if($nav){
                if($nav['pid']==0){
                    $twonav = Db::name('nav')->where('pid','=',input('param.id'))->find();
                    $onenav = $nav;
                }else {
                    $onenav = Db::name('nav')->where('id','=',$nav['pid'])->find();
                    $twonav = $nav;
                    
                }
                $article = Db::name('article')->where('nav_id','=',$twonav['id'])->order('created desc')->paginate(8);
                $page = $article->render();
                $this->assign('page',$page);
                $this->assign('article',$article);
                $this->assign('onenav',$onenav);
                $this->assign('twonav',$twonav);
                return $this->fetch();
            }else {
                $this->error('请输入正确的要浏览信息！');
            }
        }else{
            $this->error('请输入正确的要浏览信息！');
        }
        return $this->fetch();
    }
    
    ///联系我们
    public function about(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        if(is_numeric(input('param.id'))){
            $twonav = Db::name('nav')->where('htmlName','=','about')->find(input('param.id'));
            if($twonav){
                $data = Db::name('nav')->where('pid','=',input('param.id'))->find();
                if($data){
                    $onenav = $twonav;
                    $twonav = $data;
                    $article = Db::name('article')->where('nav_id','=',$twonav['id'])->find();
                }else{
                    $onenav  = Db::name('nav')->where('id','=',$twonav['pid'])->find();
                    $article = Db::name('article')->where('nav_id','=',input('param.id'))->find();
                }
            }else{
                $this->error('请输入正确的要浏览信息！');
            }
        }
        $this->assign('onenav',$onenav);
        $this->assign('twonav',$twonav);
        $this->assign('article',$article);
        return $this->fetch();
    }
    public function location(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        return $this->fetch();
    }
    ///文章详情页面
    public function article(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        if(is_numeric(input('param.pid'))){
            $sannav = Db::name('nav')->find(input('param.pid'));
            if($sannav){
                $twonav = Db::name('nav')->where('id','=',$sannav['pid'])->find();
                $onenav = Db::name('nav')->where('id','=',$twonav['pid'])->find();
                $article = Db::name('article')->where('nav_id','=',input('param.pid'))->find();
                $this->assign('onenav',$onenav);
                $this->assign('twonav',$twonav);
                $this->assign('sannav',$sannav);
                $this->assign('article',$article);
                return $this->fetch($sannav['htmlName']);
            }else{
                $this->error('请输入正确的要浏览信息！');
            }
            
        }elseif(is_numeric(input('param.id'))){
            $article = Db::name('article')->where('id','=',input('param.id'))->find();
            if($article){
                $twonav = Db::name('nav')->where('id','=',$article['nav_id'])->find();
                $onenav = Db::name('nav')->where('id','=',$twonav['pid'])->find();
                $this->assign('onenav',$onenav);
                $this->assign('twonav',$twonav);
                $this->assign('article',$article);
                $back = Db::name('article')->where('created','>',$article['created'])->where('nav_id','=',$twonav['id'])->order('created desc')->find();
                $next = Db::name('article')->where('created','<',$article['created'])->where('nav_id','=',$twonav['id'])->order('created desc')->find();
                $this->assign('back',$back);
                $this->assign('next',$next);
                return $this->fetch('details');
            }else{
                $this->error('请输入正确的要浏览信息！');
            }
        }else{
            $this->error('请输入正确的要浏览信息!');
        }
    }
    ///招聘的 详情页
    public function zhaopin(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        if(is_numeric(input('param.id'))){
            $zhaopin = Db::name('zhaopin')->find(input('param.id'));
            if($zhaopin){
                $this->assign('zhaopin',$zhaopin);
                return $this->fetch();
            }else{
                $this->error('要浏览的职位不存在！');
            }
        }else{
            $this->error('请选择要浏览的职位！');
        }
    }
    ////社会招聘
    public function shezhao(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        $data = Db::name('zhaopin')->paginate(8);
        $page = $data->render();
        $this->assign('page',$page);
        $this->assign('data',$data);
        return $this->fetch();
    }
    ////招聘问答 页面 FAQ
    public function faq(){
        //头部导航的内容
        $tree = $this->nav();
        $this->assign('list',$tree);
        return $this->fetch();
    }
}///类的结尾符
