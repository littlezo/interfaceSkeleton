<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-09-06 19:57:22
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-06 21:05:39
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\config\\wechat.php
 */

use \think\facade\Env;

return [
    // 权限设置
    'wxapp' => [
        'app_id'        => '',
        'secret'        => '',
        'response_type' => 'array',
        'log' => [
            'level'     => 'debug',
            'file'      => Env::get('runtime_path') . 'wechat.log',
        ],
    ],
    'wxpay'  => [
        'app_id'        => '',
        'mch_id'        => '',
        'cert_path'     => '',
        'key_path'      => '',
        'key'           => '',
        'notify_url'    => '',
    ],
];
