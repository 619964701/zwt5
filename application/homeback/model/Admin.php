<?php
namespace app\homeback\model;
use think\Model;

class Admin extends Model{
    function selectadmin($adminname){
        return $admin = Admin::get(['adminname'=>$adminname]);
    }
    
}
