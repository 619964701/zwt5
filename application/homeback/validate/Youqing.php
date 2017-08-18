<?php
namespace app\homeback\validate;

use think\Validate;

class Youqing extends Validate
{
    protected $rule = [
        'title'  =>  'require',
        'url'  =>  'require',
    ];

    protected $message = [
        'title.require'  =>  '友情链接标题必须填写',
        'url.require'  =>  '友情链接URL必须填写',
    ];
    
    protected $scene = [
        'edit'  =>  ['title','url'],
    ];
}