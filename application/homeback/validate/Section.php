<?php
namespace app\homeback\validate;

use think\Validate;

class Nav extends Validate
{
    protected $rule = [
        'navName'  =>  'require',
        'navEname'  =>  'require',
    ];

    protected $message = [
        'navName.require'  =>  '导航栏名称必须填写',
        'navEname.require'  =>  '导航栏英文名必须填写',
    ];
    
    protected $scene = [
        'edit'  =>  ['navName','navEname','desc'],
    ];
}