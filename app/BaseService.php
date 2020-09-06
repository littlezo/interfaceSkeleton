<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 20:35:16
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:08:53
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\BaseService.php
 */

namespace app;

use think\App;
use \EasyWeChat\Factory;
use \think\facade\Env;
use think\facade\Config;
use think\Exception;

/**
 * name
 *
 * @return \think\Response
 * @author  @小小只 <soinco@qq.com>
 * @version 1.0.0
 * @date    2020/08/28  19:51:27
 * @desc    description
 */
abstract class BaseService
{
    /**
     * 应用实例
     * @var \think\App
     */
    protected $app;
    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize()
    {
    }
    /**
     * 小程序
     */
    public static function wxapp()
    {
        $config = Config::get('wechat.wxapp');
        return Factory::miniProgram($config);
    }
    /**
     * 微信支付
     */
    public static function wxpay()
    {
        $config = Config::get('wechat.wxpay');
        return Factory::payment($config);
    }
}
