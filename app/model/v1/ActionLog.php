<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 20:02:35
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:31:15
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\model\\v1\\ActionLog.php
 */

namespace app\model\v1;

use think\Model;

class ActionLog extends Model
{
    // 设置完整的数据表（包含前缀）
    protected $table = 'action_log';

    //初始化属性
    protected function initialize()
    {
    }

    // 读取器 订单状态
    protected function getActionIpAttr($reg = '', $data = '')
    {
        return long2ip($data['action_ip']);
    }
}
