<?php
namespace rephp\debugbar\interfaces;

/**
 * debugInterface接口
 * @package rephp\debugbar\interfaces
 */
interface debugInterface
{

    /**
     * 运行
     * @param  array  $info  debug信息
     * @return string
     */
    public function run($info);

}