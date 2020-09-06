<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 06:18:15
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:04:58
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\socket\\Client.php
 */

namespace app\WebSocket;

use \GatewayClient\Gateway;

/**
 * @Application ：interfaceSkeleton 
 * @Version: 1.0.0
 * @Author: @小小只 <soinco@qq.com>
 * @Since: 2020-09-02 00:04:20
 * @LastEditors: @小小只 <soinco@qq.com>
 * @LastEditTime: Do not edit
 * @param {type} 
 * @return {type} 
 * @message: 
 */

Gateway::$registerAddress = '127.0.0.1:1236';

class Client
{
    public static function sendToAll($data)
    {
        return Gateway::sendToAll($data);
    }
    public static function sendToClient($client_id, $data)
    {
        return Gateway::sendToClient($client_id, $data);
    }
    public static function closeClient($client_id)
    {
        return Gateway::closeClient($client_id);
    }
    public static function isOnline($client_id)
    {
        return Gateway::isOnline($client_id);
    }
    public static function bindUid($client_id, $uid)
    {
        return  Gateway::bindUid($client_id, $uid);
    }
    public static function isUidOnline($uid)
    {
        return Gateway::isUidOnline($uid);
    }
    public static function getClientIdByUid($client_id)
    {
        return Gateway::getClientIdByUid($client_id);
    }
    public static function unbindUid($client_id, $uid)
    {
        return Gateway::unbindUid($client_id, $uid);
    }
    public static function sendToUid($uid, $data)
    {
        return Gateway::sendToUid($uid, $data);
    }
    public static function joinGroup($client_id, $group)
    {
        return Gateway::joinGroup($client_id, $group);
    }
    public static function sendToGroup($group, $data)
    {
        return Gateway::sendToGroup($group, $data);
    }
    public static function leaveGroup($client_id, $group)
    {
        return Gateway::leaveGroup($client_id, $group);
    }
    public static function getClientCountByGroup($group)
    {
        return Gateway::getClientCountByGroup($group);
    }
    public static function getClientSessionsByGroup($group)
    {
        return Gateway::getClientSessionsByGroup($group);
    }
    public static function getAllClientCount()
    {
        return Gateway::getAllClientCount();
    }
    public static function getAllClientSessions()
    {
        return Gateway::getAllClientSessions();
    }
    public static function setSession($client_id, $session)
    {
        return Gateway::setSession($client_id, $session);
    }
    public static function updateSession($client_id, $session)
    {
        return Gateway::updateSession($client_id, $session);
    }
    public static function getSession($client_id)
    {
        return Gateway::getSession($client_id);
    }
}
