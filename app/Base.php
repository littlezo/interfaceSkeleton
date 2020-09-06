<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 19:51:27
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:08:37
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\Base.php
 */

namespace app;

use think\App;

/**
 * name
 *
 * @return \think\Response
 * @author  @小小只 <soinco@qq.com>
 * @version 1.0.0
 * @date    2020/08/28  19:51:27
 * @desc    description
 */
abstract class Base
{
    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;
}
