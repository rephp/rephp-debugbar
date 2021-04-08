<?php

namespace rephp\debugbar\logic;

/**
 * 设置消息处理
 * @package rephp\debugbar\logic
 */
final class set
{
    /**
     * 保存message信息到data对象
     * @param string $msg
     * @param string $level
     * @return bool
     */
    private static function saveMessage($msg, $level = 'msg')
    {
        in_array($level, data::$message_type_list) || $level = 'msg';
        $pushData                      = [
            'msg'   => $msg,
            'level' => $level
        ];
        data::$message[]               = &$pushData;
        data::$message_level[$level][] = &$pushData;
        return true;
    }

    /**
     * info级message录入
     * @param string $msg 消息
     * @return bool
     */
    public static function info($msg)
    {
        return self::saveMessage($msg, 'info');
    }

    /**
     * error级message录入
     * @param string $msg 消息
     * @return bool
     */
    public static function error($msg)
    {
        return self::saveMessage($msg, 'error');
    }

    /**
     * log级message录入
     * @param string $msg 消息
     * @return bool
     */
    public static function log($msg)
    {
        return self::saveMessage($msg, 'log');
    }

    /**
     * msg级message录入
     * @param string $msg 消息
     * @return bool
     */
    public static function msg($msg)
    {
        return self::saveMessage($msg, 'msg');
    }

    /**
     * 记录事件
     * @param string $alias 事件名字标记
     * @param array  $event 事件信息
     * @return bool
     */
    public static function event($alias, $event = [])
    {
        $pushData      = [
            'alias' => $alias,
            'event' => $event
        ];
        data::$event[] = $pushData;

        return true;
    }

    /**
     * 记录SQL执行信息
     * @param string $sql     sql字符串
     * @param float  $runTime 运行时间
     * @return bool
     */
    public static function sql($sql, $runTime = 0)
    {
        $pushData    = [
            'sql'      => $sql,
            'run_time' => $runTime
        ];
        data::$sql[] = $pushData;

        return true;
    }

    /**
     * 时间录入
     * @param string $alias 时间名字标记
     * @return bool
     */
    public static function time($alias)
    {
        $alias       = data::safeFilter($alias);
        $historyTime = get::getTimeLog($alias);
        if (empty($historyTime)) {
            data::$time_log[$alias] = microtime(true);
        } else {
            data::$time[$alias] = round(microtime(true) - $historyTime, 6) . 'S';
        }

        return true;
    }

    /**
     * 内存使用录入
     * @param string $alias 内存名字标记
     * @return bool
     */
    public static function memery($alias)
    {
        $alias         = data::safeFilter($alias);
        $historyMemory = get::getMemoryLog($alias);
        if (empty($historyMemory)) {
            data::$memory_log[$alias] = memory_get_usage();
        } else {
            data::$memory[$alias] = round((memory_get_usage() - $historyMemory) / 1024, 6) . 'KB';
        }

        return true;
    }


}