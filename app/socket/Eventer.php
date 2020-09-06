<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 06:57:20
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-03 21:28:52
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\socket\\Eventer.php
 */

namespace app\socket;

use \GatewayWorker\Lib\Gateway;
use \Workerman\Worker;
use \app\ServiceDispatch;

/**
 * WebSocket 服务类
 * @Version: 1.0.0
 * @Author: @小小只 <soinco@qq.com>
 * @Since: 2020-09-02 00:05:22
 * @LastEditors: @小小只 <soinco@qq.com>
 * @LastEditTime: Do not edit
 * @param {type} 
 * @return {type} 
 * @message: 
 */

class Eventer
{
    /**
     * onWorkerStart 事件回调
     * 当businessWorker进程启动时触发。每个进程生命周期内都只会触发一次
     *
     * @access public
     * @param  \Workerman\Worker    $businessWorker
     * @return void
     */
    public static function onWorkerStart(Worker $businessWorker)
    {
        $app = new \think\worker\Application;
        $app->initialize();
    }

    /**
     * onConnect 事件回调
     * 当客户端连接上gateway进程时(TCP三次握手完毕时)触发
     *
     * @access public
     * @param  int       $client_id
     * @return void
     */
    public static function onConnect($client_id)
    {
        $message =  [
            'event'      => 'login',
            'client_id' => $client_id,
        ];
        Gateway::sendToCurrentClient(json_encode($message));
    }

    /**
     * onWebSocketConnect 事件回调
     * 当客户端连接上gateway完成websocket握手时触发
     *
     * @param  integer  $client_id 断开连接的客户端client_id
     * @param  mixed    $data
     * @return void
     */
    public static function onWebSocketConnect($client_id, $data)
    {
        var_export($data);
    }

    /**
     * onMessage 事件回调
     * 当客户端发来数据(Gateway进程收到数据)后触发
     *
     * @access public
     * @param  int       $client_id
     * @param  mixed     $data
     * @return void
     */
    public static function onMessage($client_id, $msg)
    {
        try {
            $data = json_decode($msg, true);
            $event = $data['event'];
            switch ($event) {
                case 'bind': // 登陆
                    if ($data['uid']) { // 绑定及加入群组
                        Gateway::bindUid($client_id, $data['uid']);
                        Gateway::joinGroup($client_id, 'lover');
                        $message =  [
                            'event'      => 'online',
                            'message' => "欢迎你",
                        ];
                        Gateway::sendToClient($client_id, json_encode($message));
                    }
                    break;
                case 'ping': // 心跳包
                    $isBind = Gateway::getUidByClientId($client_id);
                    if ($isBind == null) {
                        $message =  [
                            'event'      => 'login',
                            'message' => "请先登录系统哟！",
                        ];
                        Gateway::sendToClient($client_id, json_encode($message));
                    } else {
                        $message =  [
                            'event'      => 'pong',
                            'result'      => null,
                        ];
                        Gateway::sendToClient($client_id, json_encode($message));
                    }
                    break;
                default:
                    $request = ServiceDispatch::socket($data);
                    Gateway::sendToClient($client_id, json_encode($request));
            }
        } catch (\Throwable $throwable) {
            $message =  [
                'event'      => 'error',
                'code' => $throwable->getCode(),
                'message' => $throwable->getMessage(),
                'trace' => $throwable->getTrace(),
            ];
            Gateway::sendToClient($client_id, json_encode($message));
        } catch (\Exception $exception) {
            $message =  [
                'event'      => 'error',
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
                'trace' => $exception->getTrace(),
            ];
            Gateway::sendToClient($client_id, json_encode($message));
        }
    }

    /**
     * onClose 事件回调 当用户断开连接时触发的方法
     *
     * @param  integer $client_id 断开连接的客户端client_id
     * @return void
     */
    public static function onClose($client_id)
    {
        $broadcast =  [
            'event' => 'null',
            'data'      => "用户[$client_id]下线了！",
        ];
        GateWay::sendToAll(json_encode($broadcast));
    }

    /**
     * onWorkerStop 事件回调
     * 当businessWorker进程退出时触发。每个进程生命周期内都只会触发一次。
     *
     * @param  \Workerman\Worker    $businessWorker
     * @return void
     */
    public static function onWorkerStop(Worker $businessWorker)
    {
        echo "WorkerStop\n";
    }
}
