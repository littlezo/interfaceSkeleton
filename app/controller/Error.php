<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 23:37:15
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:02:02
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\controller\\Error.php
 */

namespace app\controller;

/**
 * Error
 * 全局无效请求拦截.
 */
class Error
{
    /**
     * Error
     * 全局无效请求拦截
     *
     */
    public static function Error()
    {
        // 统一拦截无效请求
        throw new \think\Exception("非法请求！", 400);
    }
}
