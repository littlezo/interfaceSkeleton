<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-09-06 19:57:22
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-06 20:35:49
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\config\\auth.php
 */
return [
    // 权限设置
    'auth_config'            => [
        'auth_on'            => true,                      // 认证开关
        'auth_type'          => 1,                         // 认证方式，1为实时认证；2为登录认证。
        'auth_group'         => 'tp_auth_group',        // 用户组数据表名
        'auth_group_access'  => 'tp_auth_group_access', // 用户-用户组关系表
        'auth_rule'          => 'tp_auth_rule',         // 权限规则表
        'auth_user'          => 'tp_admin'             // 用户信息表
    ],
];
