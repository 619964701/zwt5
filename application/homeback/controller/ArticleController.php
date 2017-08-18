<?php
namespace app\homeback\controller;
use app\homeback\behavior\AuthController;
use think\Request;
use think\Db;
use think\Session;

class ArticleController extends AuthController{
    function index(){
        if(Request::instance()->isGet()){
            if(input('get.tiaoshu')){
                $tiaoshu = input('get.tiaoshu');
                Session::set('tiaoshu',$tiaoshu);
            }else if(Session::get('tiaoshu')){
                $tiaoshu = Session::get('tiaoshu');
            }else{
                $tiaoshu = 10;
                Session::set('tiaoshu',$tiaoshu);
            }
            $navid = input('get.navid');
            $pageParam['query']['nav_id'] = $navid;
            $nv = Db::name('nav')->where('pid','=',$navid)->select();
            if(count($nv)==0){
                $newarr[]='';
            }else{
                foreach ($nv as $vo){
                    $newarr[]=$vo['id'];
                }  
            }
        }
        if(input('param.nav_id')){
            dump(input('param.nav_id'));
            $navid = input('param.nav_id');
            $pageParam['query']['nav_id'] = $navid;
        }
        if($navid){
            if(count($nv)==0){
                $map['nav_id'] = $navid;
                $subQuery = Db::table('zwt_article')
                ->alias('a')
                ->where($map)
                ->field('a.*,n.pid,n.id nid,n.navName xnavName')
                ->join('__NAV__ n','a.nav_id = n.id')
                ->buildSql();
            }else{
                $subQuery = Db::table('zwt_article')
                ->alias('a')
                ->where('nav_id','in',$newarr)
                ->field('a.*,n.pid,n.id nid,n.navName xnavName')
                ->join('__NAV__ n','a.nav_id = n.id')
                ->buildSql();
            }
        }else{
            $subQuery = Db::table('zwt_article')
            ->alias('a')
            ->field('a.*,n.pid,n.id nid,n.navName xnavName')
            ->join('__NAV__ n','a.nav_id = n.id')
            ->buildSql();
        }
        
        $data = Db::table($subQuery.' s')
         ->field('s.*,b.navName dnavName')
         ->join('__NAV__ b','s.pid = b.id')
         ->order('s.pid,s.xnavName')
         ->paginate($tiaoshu,false,$pageParam);
        $nav =  Db::name('nav')->where('pid','=','0')->select();
        $this->assign('nav',$nav);
        if(input('post.province')){
            $province = input('post.province');
            $data =  Db::name('nav')->where('pid','=',$province)->select();
            return json($data);
        }
        foreach ($data as $k=>$vo){
            $zuxian = Db::name('nav')->where('id','=',$vo['pid'])->find();
            if($zuxian['pid']==0){
                $data[$k] = array_merge($data[$k],array('zuxian'=>''));
            }else{
                $zzuxian = Db::name('nav')->where('id','=',$zuxian['pid'])->find();
                $data[$k] = array_merge($data[$k],array('zuxian'=>$zzuxian['navName']));
            }
        }
        $page = $data->render();
        $total = $data->total();
        $ye = ceil($total/$tiaoshu);
        $tiaoshu = Session::get('tiaoshu');
        $this->assign('tiaoshu',$tiaoshu);
        $this->assign('ye',$ye);
        $this->assign('page',$page);
        $this->assign('data',$data);
        return $this->fetch();
    }
   
    //添加文章
    function add(){
        $data =  Db::name('nav')->where('pid','=','0')->select();
        $this->assign('data',$data);
        if(input('post.province')){
            $province = input('post.province');
            $data =  Db::name('nav')->where('pid','=',$province)->select();
            return json($data);
        }
        if(input('post.city')){
            $city = input('post.city');
            $data =  Db::name('nav')->where('pid','=',$city)->select();
            return json($data);
        }
        if(request()->isPost()){
            if($_FILES['img']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('img');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                if($info){
                    $img = '/static/uploads/'.date('Ymd').'/'.$info->getFilename();
                }else{
                    // 上传失败获取错误信息
                    return $this->error($file->getError());
                }
            }else{
                 $img = '暂无缩略图';
            }
            if(input('params')=="case"){
                $case = input('params');
            }else{
                $case = null;
            }
            $navid = input('navid');
            if(input('countyid')!="请选择"){
                $navid = input('countyid');
            }
            $data = [
                'title'=>input('title'),
                'title_alias'=>input('title_alias'),
                'img'=>$img,
				'yinxu'=>input('yinxu'),
                'params'=>$case,
                'introtext'=>input('introtext'),
                'nav_id'=>$navid,
                'created'=>date('Y-m-d H:i:s'),
                'created_by'=>input('created_by'),
            ];
            $db = Db::name('article')->insert($data);
            if($db){
                return $this->success('添加文章成功！','article/index');
            }else{
                return $this->error('添加文章失败！');
            }
        }
        return $this->fetch();
    }
    ///修改文章
    function edit(){
        if(input('param.id')){
            $article = Db::name('article')->find(input('param.id'));
            $xiaonav = Db::name('nav')->find($article['nav_id']);
            $danav = Db::name('nav')->find($xiaonav['pid']);
            if($danav['pid']!=0){
                $zuxian = Db::name('nav')->find($danav['pid']);
                $this->assign('zuxian',$zuxian);
            }else{
                $zuxian = '';
                $this->assign('zuxian',$zuxian);
            }
            $data =  Db::name('nav')->where('pid','=','0')->select();
            $this->assign('data',$data);
            $this->assign('danav',$danav);
            $this->assign('xiaonav',$xiaonav);
            $this->assign('article',$article);
            //dump($article);
        }else{
            $this->error('请选择要编辑的文章');
        }
        return $this->fetch();
    }
     function update(){
         if(input('param.id')){
             if(input('params')=="case"){
                 $case = input('params');
             }else{
                 $case = null;
             }
             if(input('countyid')){
                 if(input('hiddencounty')==input('countyid')&&input('hiddencity')==input('navid')){
                     $navid = input('countyid');
                 }elseif(input('hiddencounty')!=input('countyid')&&input('countyid')!='请选择'){
                     $navid = input('countyid');
                 }else{
                     $navid = input('navid');
                 }
             }
             $data = [
                 'id'=>input('param.id'),
                 'title'=>input('title'),
                 'params'=>$case,
				 'yinxu'=>input('yinxu'),
                 'title_alias'=>input('title_alias'),
                 'introtext'=>input('introtext'),
                 'nav_id'=>$navid,
                 'created'=>date('Y-m-d H:i:s'),
                 'created_by'=>input('created_by'),
             ];
            if($_FILES['img']['tmp_name']){
                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file('img');
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                if($info){
                    $article = Db::name('article')->find(input('param.id'));
                    if($article['img']!="暂无缩略图"){
                        //dump(ROOT_PATH . 'public' . DS .$article['img']);die;
                        unlink(ROOT_PATH . 'public' . DS .$article['img']);
                    }
                    $data['img'] = '/static/uploads/'.date('Ymd').'/'.$info->getFilename();
                }else{
                    // 上传失败获取错误信息
                    return $this->error($file->getError());
                }
            }
            $db = Db::name('article')->update($data);
            if($db){
                return $this->success('修改文章成功','article/index');
            }else{
                return $this->error('修改文章失败！');
            }
         }else{
                return $this->error('请选择要修改的文章！');
         }
     }
    
     //删除文章
     function delete(){
         if(input('param.id')){
             $data = Db::name('article')->find(input('param.id'));
             $db = Db::name('article')->delete(input('param.id'));
             if($db){
                 if($data['img']!="暂无缩略图"){
                     unlink(ROOT_PATH . 'public' . DS .$data['img']);
                 }
                 return $this->success('删除文章成功','article/index');
             }else{
                 return $this->error('删除文章失败！');
             }
         }else{
             return $this->error('删除文章失败！');
         }
     }
     
     
     
     
}//类的结尾符