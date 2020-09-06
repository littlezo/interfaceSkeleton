<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 19:52:03
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:31:00
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\model\\v1\\AuthRoleUser.php
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
class AuthRoleUser extends Model
{
    //初始化属性
    protected function initialize()
    {
    }

    //关联一对一 角色
    public function authRule()
    {
        return $this->hasOne('authRole', 'id', 'role_id');
    }

    //关联一对一 角色
    public function authAccess()
    {
        return $this->hasOne('authAccess', 'role_id', 'role_id');
    }

    /**
     * innerAuthRole 全连 auth_role表 返回roleId
     * @param int     $uid   用户ID
     * @return array
     */
    public static function innerAuthRole($uid)
    {
        return AuthRoleUser::alias('AuthRoleUser')
            ->join('__AUTH_ROLE__ AuthRole', 'AuthRoleUser.role_id = AuthRole.id')
            ->where(['AuthRoleUser.user_id' => $uid, 'AuthRole.status' => 1])
            ->column('role_id');
    }

    /**
     * 加入角色权限
     * @param array     $role_id   角色ID
     * @param int     $user_id   用户ID
     * @return bool
     */
    public function authRoleUserAdd($role_id, $user_id)
    {
        $data = [];
        if (is_array($role_id)) {
            self::where(['user_id' => $user_id])->delete();
            foreach ($role_id as $v) {
                $data[]  = [
                    'role_id' => $v,
                    'user_id' => $user_id
                ];
            }
            self::saveAll($data);

            return true;
        }
        return false;
    }

    /**
     * 删除角色权限
     * @param int     $user_id   用户ID
     * @return bool
     */
    public function authRoleUserDelete($user_id)
    {
        self::where(['user_id' => $user_id])->delete();
        AuthAccess::where(['role_id' => $user_id, 'type' => 'admin'])->delete();
    }
}
