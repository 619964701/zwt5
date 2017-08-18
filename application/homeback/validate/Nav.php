<?php
namespace app\homeback\validate;

use think\Validate;

class Nav extends Validate
{
    protected $rule = [
        'navName'  =>  'require',
        'cssName'  =>  'require',
        'htmlName'  =>  'require',
    ];

    protected $message = [
        'navName.require'  =>  '导航栏名称必须填写',
        'cssName.require'  =>  '样式必须填写',
        'htmlName.require'  =>  '被访问的模板必须填写',
    ];
    
    protected $scene = [
        'edit'  =>  ['navName','htmlName','cssName','desc'],
    ];
}