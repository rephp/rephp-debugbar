<?php

namespace rephp\debugbar;

use rephp\component\container\container;
use rephp\debugbar\interfaces\debugInterface;

/**
 * rephp debugbar
 * @package rephp\debugbar
 */
final class debugbar implements debugInterface
{
    /**
     * @var 开始执行时间
     */
    private $startTime;
    /**
     * @var int 内存占用
     */
    private $startMemory;


    /**
     * 初始化bug设置
     * @return boolean
     */
    public function __construct()
    {
        $this->startTime   = microtime(TRUE);
        $this->startMemory = memory_get_usage();
    }


    /**
     * 运行
     * @param array $info debug信息
     * @return string
     */
    public function run($info = '')
    {
        empty($info) && $info = $this->getDebugInfo();
        //判断环境是cli还是web
        $bootstrap = 'rephp\\debugbar\\bootstrap\\' . (defined('CLI_URI') ? 'cliBootStrap' : 'webBootStrap');
        container::getContainer()->bind('coreDebugbar', $bootstrap)->run($info);
    }

    /**
     * 获取php加载的文件
     * @return string[]
     */
    public function getFiles()
    {
        $files = get_included_files();
        foreach ($files as $key => $file) {
            $files[$key] = $file . ' ( ' . number_format(filesize($file) / 1024, 2) . ' KB )';
        }

        return $files;
    }

    /**
     * 获取执行的sql命令
     * @return string[]
     */
    public function getSql()
    {
        return [];
    }

    /**
     * 获取基本信息
     */
    public function getBasic()
    {

    }

    /**
     * 获取事件信息
     */
    public function getEvent()
    {
        return container::getContainer()->get('event')->getAllEventName();
    }

    /**
     * 输出调试信息
     */
    public function getInfo()
    {
        return [
            'list_info'  => [
                'basic' => ['name' => '基本信息', 'data' => $this->getBasic()],
                'files' => ['name' => '文件', 'data' => $this->getFiles()],
                'sqls'  => ['name' => 'SQL', 'data' => $this->getSql()],
                'event' => ['name' => '事件', 'data' => $this->getEvent()],
            ],
            'other_info' => [
                'runtime' => round(microtime(TRUE) - $this->startTime, 6) . 'S',
                'memory'  => round((memory_get_usage() - $this->startMemory) / 1024, 6) . 'KB',
            ],
        ];
    }


}