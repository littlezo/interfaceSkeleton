<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 19:52:03
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:31:03
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\model\\v1\\AuthRole.php
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
class AuthRole extends Model
{
    //初始化属性
    protected function initialize()
    {
    }

    //一对多 权限授权
    public function authAccess()
    {
        return $this->hasMany('AuthAccess', 'role_id', 'id');
    }

    /**
     * 关联删除 AuthAccess
     * 判断是否有用户使用此角色,如果有返回使用角色数量
     * 否则删除角色数据,调用authAccess方法如果有数据删除关联AuthAccess模型数据
     *
     * @return bool
     */
    public function authRoleDelete()
    {
        $roleCount = AuthRoleUser::where(['role_id' => $this->id])->count();
        if ($roleCount > 0) {
            return "已有{$roleCount}用户在是有此角色不可删除";
        }

        if ($this->delete()) {
            if ($this->authAccess) {
                AuthAccess::where(['role_id' => $this->id, 'type' => 'admin_url'])->delete();
            }
            return true;
        }
        return false;
    }
}
