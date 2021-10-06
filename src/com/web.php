<?php

namespace rephp\debugbar\com;

use rephp\debugbar\interfaces\debugInterface;

/**
 * web debug 组件
 */
final class web implements debugInterface
{

    /**
     * 运行
     * @param  array  $info  debug信息
     * @return string
     */
    public function run($info)
    {
        ob_start();
        include dirname(__DIR__) . '/view/debugbar.php';
        return ob_get_clean();
    }

}