<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-09-06 19:57:22
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-06 21:05:48
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\config\\worker.php
 */

return [
    // 扩展自身需要的配置
    'host'                  => '0.0.0.0', // 监听地址
    'port'                  => 2346, // 监听端口
    'root'                  => '', // WEB 根目录 默认会定位public目录
    'app_path'              => '', // 应用目录 守护进程模式必须设置（绝对路径）
    'file_monitor'          => false, // 是否开启PHP文件更改监控（调试模式下自动开启）
    'file_monitor_interval' => 2, // 文件监控检测时间间隔（秒）
    'file_monitor_path'     => [], // 文件监控目录 默认监控application和config目录

    // 支持workerman的所有配置参数
    'name'                  => 'thinkphp',
    'count'                 => 4,
    'daemonize'             => false,
    'pidFile'               => '',
];
