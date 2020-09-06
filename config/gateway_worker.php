<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-09-06 19:57:22
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-06 21:03:00
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\config\\gateway_worker.php
 */

declare(strict_types=1);


return [
    // 扩展自身需要的配置
    'protocol'              => 'websocket', // 协议 支持 tcp udp unix http websocket text
    'host'                  => '0.0.0.0', // 监听地址
    'port'                  => 29001, // 监听端口
    'socket'                => '', // 完整监听地址
    'context'               => [],
    'register_deploy'       => true, // 是否需要部署register
    'businessWorker_deploy' => true, // 是否需要部署businessWorker
    'gateway_deploy'        => true, // 是否需要部署gateway

    // Register配置
    'registerAddress'       => '127.0.0.1:1236',

    // Gateway配置
    'name'                  => 'three',
    'count'                 => 4,
    'lanIp'                 => '127.0.0.1',
    'startPort'             => 2000,
    'daemonize'             => false,
    'pingInterval'          => 30,
    'pingNotResponseLimit'  => 2,
    'pingData'              => '',

    // BusinsessWorker配置
    'businessWorker'        => [
        'name'         => 'ThreeWorker',
        'count'        => 8,
        'eventHandler' => '\app\socket\Eventer',
    ],

];
