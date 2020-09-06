<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 19:52:03
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:31:09
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\model\\v1\\AuthAccess.php
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
class AuthAccess extends Model
{
    //初始化属性
    protected function initialize()
    {
    }

    //关联一对一 角色
    public function authRule()
    {
        return $this->hasOne('AuthRule', 'menu_id', 'menu_id');
    }

    /**
     * innerAuthRule 全连 AuthRule表 返回 授权角色
     * @param int     $roleId
     * @param int     $uid
     * @return array
     */
    public static function innerAuthRule($roleId, $uid, $where = [])
    {
        return AuthAccess::alias('AuthAccess')
            ->join('__MENU__ Menu', 'AuthAccess.menu_id = Menu.id')
            ->where($where)
            ->where('(AuthAccess.type="admin_url" and AuthAccess.role_id in(:roleId))or(AuthAccess.type="admin" and AuthAccess.role_id =:uid)', [
                'roleId'    => $roleId,
                'uid'       => $uid
            ])
            ->column('*', 'menu_id');
    }
}
