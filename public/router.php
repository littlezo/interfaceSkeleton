<?php

declare(strict_types=1);

/*
 * @Application ：interfaceSkeleton 
 * @Version     : 1.0.0
 * @Author      : @小小只 <soinco@qq.com>
 * @Since       : 2020-09-06 19:57:22
 * @LastAuthor  : @小小只 <soinco@qq.com>
 * @lastTime    : 2020-09-06 21:00:20
 * @Github      : https://github.com/littlezo
 * @Copyright   : 2017-2020 @小小只
 * @联系方式    : QQ:970055999  WeChat: littlezov email: soinco@qq.com
 * @版权声明    : @小小只 拥有所有权利,未取得授权禁止任何形式的代码拷贝、派生行为 如需引用 需取得所有者授权方可
 * @FilePath    : \\public\\router.php
 */

if (is_file($_SERVER["DOCUMENT_ROOT"] . $_SERVER["SCRIPT_NAME"])) {
    return false;
} else {
    $_SERVER["SCRIPT_FILENAME"] = __DIR__ . '/index.php';

    require __DIR__ . "/index.php";
}
