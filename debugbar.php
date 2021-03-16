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
        $this->startTime   = microtime(true);
        $this->startMemory = memory_get_usage();
    }


    /**
     * 运行
     * @param array $info debug信息
     * @return string
     */
    public function run($info = '')
    {
        empty($info) && $info = $this->getAllInfo();
        //判断环境是cli还是web
        $bootstrap = 'rephp\\debugbar\\bootstrap\\' . (defined('CLI_URI') ? 'cliBootStrap' : 'consoleBootStrap');
        return container::getContainer()->bind('coreDebugbar', $bootstrap)->run($info);
    }

    /**
     * 获取php加载的文件
     * @return string[]
     */
    public function getFileInfo()
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
    public function getSqlInfo()
    {
        return [];
    }

    /**
     * 获取基本信息
     */
    public function getBasicInfo()
    {

    }

    /**
     * 获取事件信息
     */
    public function getEventInfo()
    {
        $event = container::getContainer()->get('event');
        return $event::getAllEventName();
    }

    /**
     * 获取输出
     */
    public function getDebugInfo()
    {
        $debug = container::getContainer()->get('debug');
        return $debug::getDebugInfo();
    }

    /**
     * 输出调试信息
     */
    public function getAllInfo()
    {
        return [
            'list_info'  => [
                'basic' => ['name' => '基本信息', 'data' => $this->getBasicInfo()],
                'files' => ['name' => '文件', 'data' => $this->getFileInfo()],
                'sqls'  => ['name' => 'SQL', 'data' => $this->getSqlInfo()],
                'event' => ['name' => '事件', 'data' => $this->getEventInfo()],
                'message'=>['name' => '调试', 'data' => $this->getDebugInfo()],
            ],
            'other_info' => [
                'runtime' => round(microtime(true) - $this->startTime, 6) . 'S',
                'memory'  => round((memory_get_usage() - $this->startMemory) / 1024, 6) . 'KB',
            ],
        ];
    }


}