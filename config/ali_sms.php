<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-09-06 19:57:22
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-06 21:06:34
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\config\\ali_sms.php
 */

return [
    'version'       => '2017-05-25',
    'host'          => 'dysmsapi.aliyuncs.com',
    'scheme'        => 'http',
    'region_id'     => 'cn-hangzhou',
    'access_key'    => 'your aliyun accessKeyId',
    'access_secret' => 'your aliyun accessSecret',
    'product'       => '产品名称(短信签名)',
    'actions'       => [
        'register'        => [
            'sign_name'      => '注册验证',
            'template_code'  => 'SMS_67105498',
            'template_param' => [
                'code'    => '',
                'product' => '',
            ],
        ],
        'login'           => [
            'sign_name'      => '登录验证',
            'template_code'  => 'SMS_67105500',
            'template_param' => [
                'code'    => '',
                'product' => '',
            ],
        ],
        'change_password' => [
            'sign_name'      => '变更验证',
            'template_code'  => 'SMS_67105496',
            'template_param' => [
                'code'    => '',
                'product' => '',
            ],
        ],
    ],
];
