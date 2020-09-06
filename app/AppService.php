<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 01:00:06
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:29:18
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\AppService.php
 */

namespace app;

use think\Service;

/**
 * 应用服务类 
 * @Version: 1.0.0
 * @Author: @小小只 <soinco@qq.com>
 * @Since: 2020-09-02 00:07:10
 * @LastEditors: @小小只 <soinco@qq.com>
 * @LastEditTime: Do not edit
 * @param {type} 
 * @return {type} 
 * @message: 
 */
class AppService extends Service
{
    public function register()
    {
        // 服务注册
        \tauthz\TauthzService::class;
    }

    public function boot()
    {
        // 服务启动
    }
}
