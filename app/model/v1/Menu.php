<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 19:52:03
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:30:42
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\model\\v1\\Menu.php
 */

namespace app\model\v1;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 业务模型
 * @author  @小小只 <soinco@qq.com>
 * @version 1.0.0
 * @date    2020/08/28  19:52:03
 * @desc    description
 *
 */
class Menu extends Model
{
    //初始化属性
    protected function initialize()
    {
    }

    /**
     * 缓存后台菜单数据
     */
    public static function actionLogMenu()
    {
        $log = [];
        $men = Menu::where('request <> "" ')->column('*');

        foreach ($men as $v) {
            $url = strtolower($v['app'] . '/' . $v['model'] . '/' . $v['action']);
            $arr = [
                'log_rule'  => $v['log_rule'],
                'request'   => $v['request'],
                'rule_param' => $v['rule_param'],
                'name'      => $v['name'],
            ];
            if (!isset($log[$url])) {
                $log[$url]              = $arr;
            } else {
                $log[$url]['child'][]   = $arr;
            }
        }
        return $log;
    }
}
