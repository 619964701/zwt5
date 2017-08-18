<?php
namespace app\homeback\model;
use think\Model;

class Section extends Model{
    public function categorys(){
        return $this->hasMany('Category');
    }
    
    public function articles(){
        return $this->hasMany('Article');
    }
}
