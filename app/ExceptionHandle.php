<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-08-28 22:16:41
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-02 00:09:40
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\app\\ExceptionHandle.php
 */

namespace app;

use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\HttpResponseException;
use think\exception\ValidateException;
use think\Response;
use think\Exception;
use Throwable;

/**
 * 应用异常处理类
 */
class ExceptionHandle extends Handle
{
    /**
     * 不需要记录信息（日志）的异常类列表
     * @var array
     */
    protected $ignoreReport = [
        HttpException::class,
        HttpResponseException::class,
        ModelNotFoundException::class,
        DataNotFoundException::class,
        ValidateException::class,
    ];

    /**
     * 记录异常信息（包括日志或者其它方式记录）
     *
     * @access public
     * @param  Throwable $exception
     * @return void
     */
    public function report(Throwable $exception): void
    {
        // 使用内置的方式记录异常日志
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \think\Request   $request
     * @param Throwable $throwable
     * @return Array
     */
    public function render($request, Throwable $throwable): Response
    {
        // 添加自定义异常处理机制
        if ($throwable instanceof Exception) {
            // 格式化输出
            $data = [
                'code' => $throwable->getCode(),
                'message' => $throwable->getMessage(),
                'tree' => $throwable->getTrace(),
                'TraceAs' => $throwable->getTraceAsString(),
            ];
            return json($data, 403);
        }
        $this->isJson = true;
        if ($throwable instanceof HttpResponseException) {
            return $throwable->getResponse();
        } elseif ($throwable instanceof HttpException) {
            return $this->renderHttpException($throwable);
        } else {
            return $this->convertExceptionToResponse($throwable);
        }
        // 其他错误交给系统处理
        // return parent::render($request, $throwable);
    }
}
