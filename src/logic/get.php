<?php

namespace rephp\debugbar\logic;

/**
 * 获取debug信息
 * @package rephp\debugbar\logic
 */
final class get
{

    /**
     * 获取基本信息
     */
    public static function getBasicInfo()
    {
        return [
            ['name' => '操作系统',      'value' => php_uname()],
            ['name' => 'PHP版本',      'value' => phpversion()],
            ['name' => 'PHP运行方式',   'value' => php_sapi_name()],
            ['name' => '当前进程用户名', 'value' => Get_Current_User()],
            ['name' => 'PHP安装路径',   'value' => DEFAULT_INCLUDE_PATH],
            ['name' => '服务器IP',      'value' => GetHostByName($_SERVER['SERVER_NAME'])],
            ['name' => '服务器解译引擎', 'value' => $_SERVER['SERVER_SOFTWARE']],
            ['name' => '页面地址',      'value' => $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']],
            ['name' => '请求参数',      'value' => print_r($_REQUEST, 1)],
            ['name' => 'SERVER',      'value'  => print_r($_SERVER, 1)],
        ];
    }

    /**
     * 获取php加载的文件
     * @return string[]
     */
    public static function getFileInfo()
    {
        $files = get_included_files();
        foreach ($files as $key => $file) {
            $files[$key] = $file . ' ( ' . number_format(filesize($file) / 1024, 2) . ' KB )';
        }

        return $files;
    }

    /**
     * 获取事件信息
     */
    public static function getEventInfo()
    {
        return data::$event;
    }

    /**
     * 获取输出
     */
    public static function getMessageInfo($level = '')
    {
        return empty($level) ? data::$message : data::$message_level[$level];
    }

    /**
     * 获取执行的sql命令
     * @return string[]
     */
    public static function getSqlInfo()
    {
        return data::$sql;
    }

    /**
     * 获取用时情况
     * @param string $alias 标记名字
     * @return mixed
     */
    public static function getTime($alias = '')
    {
        return empty($alias) ? data::$time : data::$time[$alias];
    }

    /**
     * 获取用时首次记录
     * @param string $alias 标记名字
     * @return mixed
     */
    public static function getTimeLog($alias)
    {
        return data::$time_log[$alias];
    }

    /**
     * 获取内存占用情况
     * @param string $alias 标记名字
     * @return mixed
     */
    public static function getMemory($alias = '')
    {
        return empty($alias) ? data::$memory : data::$memory[$alias];
    }

    /**
     * 获取内存首次记录
     * @param string $alias 标记名字
     * @return mixed
     */
    public static function getMemoryLog($alias)
    {
        return data::$memory_log[$alias];
    }

    /**
     * 输出调试信息
     */
    public static function getAllInfo()
    {
        $result = [
            'list_info'  => [
                'basic'   => ['name' => '基本信息', 'data' => self::getBasicInfo()],
                'files'   => ['name' => '文件', 'data' => self::getFileInfo()],
                'sqls'    => ['name' => 'SQL', 'data' => self::getSqlInfo()],
                'event'   => ['name' => '事件', 'data' => self::getEventInfo()],
                'message' => ['name' => '调试', 'data' => self::getMessageInfo()],
            ],
            'other_info' => [
                'runtime' => self::getTime(data::APP_LIFE_ALIAS),
                'memory'  => self::getMemory(data::APP_LIFE_ALIAS),
            ],
        ];
        //判断内存标记及用时标记
        $allTimeList   = self::getTime();
        array_pop($allTimeList);
        $allMemoryList = self::getMemory();
        array_pop($allMemoryList);
        //判断是否需要加载数据
        empty($allTimeList)   || $result['list_info']['time']   = ['name' => '时间点', 'data' => $allTimeList];
        empty($allMemoryList) || $result['list_info']['memory'] = ['name' => '内存点', 'data' => $allMemoryList];;

        return $result;
    }


}