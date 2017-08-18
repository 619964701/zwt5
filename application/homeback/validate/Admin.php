<?php
namespace app\homeback\validate;

use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'adminname'  =>  'require|min:4|max:20|unique:admin',
        'password'  =>  'require|min:6|max:32',
        'nickname'  =>  'require',
    ];

    protected $message = [
        'adminname.unique'  =>  '管理员账户已存在',
        'adminname.require'  =>  '管理员账户必须填写',
        'adminname.max'  =>  '管理员账户长度不能超过二十位',
        'adminname.min'  =>  '管理员账户长度不能少于四位',
        'password.require'  =>  '管理员密码必须填写',
        'password.min'  =>  '管理员密码不得少于六位',
        'password.max'  =>  '管理员密码不得超过三十二位',
        'nickname.require'  =>  '昵称必须填写',
    ];
    
    protected $scene = [
        'edit'  =>  ['adminname'  =>  'require|min:4|max:20','password','nickname'],
    ];
}