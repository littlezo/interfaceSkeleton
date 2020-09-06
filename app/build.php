<?php

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 16:04:14
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-06 21:08:01
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\build.php
 */
return [
    '__app__' => [],
    // 需要自动创建的目录
    '__dir__'    => ['library'],
    // 需要自动创建的文件
    '__file__'   => ['library/Tree.php'],
    // 需要自动创建的控制器
    'controller' => [],
    // 需要自动创建的模型
    'model'      => [
        'v1/ActionLog',
        'v1/Admin',
        'v1/AuthAccess',
        'v1/AuthRole',
        'v1/AuthRoleUser',
        'v1/Avatar',
        'v1/Friends',
        'v1/Group',
        'v1/Layout',
        'v1/Menu',
        'v1/Message',
        'v1/Order',
        'v1/StorageInfo',
        'v1/StorageDriver',
        'v1/StorageGroup',
        'v1/Tags',
        'v1/User',
        'v1/User',
        'v1/heartLog'
    ],
    // 需要自动创建的模板
    'event'       => [],
    // 需要自动创建的模板
    'service'       => [
        'v1/Auth', //权限
        'v1/Avatar', // 头像
        'v1/Chat', // 聊天
        'v1/Group', // 用户组
        'v1/Layout', // 布局
        'v1/Menu', // 菜单
        'v1/Order', // 订单
        'v1/Push', // 推送
        'v1/Seek', // 速配
        'v1/Tags', // 标签
        'v1/Upload', // 上传
        'v1/User', // 用户
        'v1/Heart', // 用户

    ],
    // 需要自动创建的模板
    'validate'       => [],
];
