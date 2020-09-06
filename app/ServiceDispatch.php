<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 21:49:53
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:10:15
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\ServiceDispatch.php
 */

declare(strict_types=1);

namespace app;

use think\facade\Request;

/**
 * 服务路由调度中心
 * @Version: 1.0.0
 * @Author: @小小只 <soinco@qq.com>
 * @Since: 2020-09-02 00:10:04
 * @LastEditors: @小小只 <soinco@qq.com>
 * @LastEditTime: Do not edit
 */
/**
 * ServiceDispatch
 * 服务路由调度中心.
 */
class ServiceDispatch
{
    /**
     * run
     * http 消息调度
     *
     * @param mixed $data 传入数据
     * @param int $fd 会话ID
     * @return mixed
     */
    public static function run()
    {
        $data = [
            'scheme'         =>  Request::scheme(),
            'contentType'         =>  Request::contentType(),
            'pathinfo'         =>  Request::pathinfo(),
            'time'         =>  Request::time(),
            'method'         =>  Request::method(),
            'param'         =>  Request::param(),
            'header'         =>  Request::header(),
        ];
        // $param = $data['param'];
        $param['method'] =  $data['method'];
        $param['service'] = $data['param']['service'];
        $param['param'] = $data['param']['param'];
        $param['uuid'] = $data['header']['uuid'];
        if ($data['method'] === "POST" && $data['pathinfo'] === "api") {
            if ($param != null) {
                return json(self::handle($param));
            }
        }
        // return json($data);
        // return $data;

        // 统一拦截无效请求
        throw new \think\Exception("非法请求1！", 400);
    }

    /**
     * socket
     * websocket 消息调度
     *
     * @param mixed $data 传入数据
     * @param int $fd 会话ID
     * @return mixed
     */
    public static function socket($param)
    {
        // return $data;
        if ($param != null) {
            return self::handle($param);
        }
        // 统一拦截无效请求
        throw new \think\Exception("非法请求！", 400);
    }

    /**
     * handle
     * 消息处理
     *
     * @param mixed $data 传入数据
     * @param int $fd 会话ID
     * @return mixed
     */
    public static function handle($param)
    {
        try {
            // 开发期间直接处理
            // 解密消息
            // $param = json_decode($param, true);
            // 调度服务处理消息并返回
            // 调度相应服务
            // 拦截无效请求
            if (!isset($param['service']) && !isset($param['method']) && !isset($param['uuid'])) {
                throw new \think\Exception("非法请求！", 400);
            }
            return self::dispatch($param);


            // 非开发模式调用消息加密和解密处理数据
            // $data = decrypt($data)
            // 业务逻辑
            // ....
            // 将数据加密后返回
            // $return = encrypt($data)
        } catch (\Throwable $throwable) {
            throw $throwable;
            // throw new \think\Exception($throwable->getCode(),$throwable->getMessage());
        } catch (\Exception $exception) {
            throw $exception;
            // throw new \think\Exception($exception->getCode(),$exception->getMessage());
        }
    }

    /**
     * dispatch
     * 消息调度
     *
     * @param array $data 传入数据
     * @param int $fd 会话ID
     * @return mixed
     */
    public static function dispatch($param = [])
    {
        try {
            // 解析服务
            $service = explode('@', $param['service']);
            if (is_array($service) && count($service) != 2) {
                throw new \think\Exception('异常消息q', 10006);
            }
            $operation = $service[1];
            // 获取并注入服务
            $dispatch = 'app\\service\\v1\\' . $service[0] . 'Service';
            // 调用并返回结果
            $result = $dispatch::$operation($param);
            return $result;
        } catch (\Throwable $throwable) {
            throw $throwable;
            // throw new \think\Exception($throwable->getCode(),$throwable->getMessage());
        } catch (\Exception $exception) {
            throw $exception;
            // throw new \think\Exception($exception->getCode(),$exception->getMessage());
        }
    }

    /**
     * encrypt
     * 加密消息
     *
     * @param string $str 加密前的字符串
     * @param string $key 密钥
     * @return string 加密后的消息
     */
    public function encrypt($str, $key = '')
    {
        $coded = '';
        $keyLength = strlen($key);

        for ($i = 0, $count = strlen($str); $i < $count; $i += $keyLength) {
            $coded .= substr($str, $i, $keyLength) ^ $key;
        }

        return str_replace('=', '', base64_encode($coded));
    }


    /**
     * decrypt
     * 解密消息
     *
     * @param string $str 加密后的字符串
     * @param string $key 密钥
     * @return mixed 解密后的消息
     */
    public function decrypt($str, $key = '')
    {
        $coded = '';
        $keyLength = strlen($key);
        $str = base64_decode($str);

        for ($i = 0, $count = strlen($str); $i < $count; $i += $keyLength) {
            $coded .= substr($str, $i, $keyLength) ^ $key;
        }

        return $coded;
    }
}
