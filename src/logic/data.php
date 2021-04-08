<?php

namespace rephp\debugbar\logic;

/**
 * 存放数据的类
 * @property static $sql            sql记录
 * @property static $message        debug所有消息记录
 * @property static $message_level  按级别保存message
 * @property static $event          事件记录
 * @property static $time           时间记录
 * @property static $time_log       时间记录日志
 * @property static $memory         内存记录
 * @property static $memory_log     内存记录日志
 * @package rephp\debugbar\logic
 */
class data
{
    const APP_LIFE_ALIAS = '_all_life';

    /**
     * 定义message等级列表
     */
    public $message_type_list = [
        'info',
        'error',
        'log',
        'msg',
    ];

    /**
     * @var array sql记录
     */
    public static $sql = [];

    /**
     * @var array debug消息记录
     */
    public static $message = [];

    /**
     * @var array debug消息记录-按等级存储
     */
    public static $message_level = [];

    /**
     * @var array 事件
     */
    public static $event = [];

    /**
     * @var array 时间记录
     */
    public static $time = [];

    /**
     * @var array 时间记录日志
     */
    public static $time_log = [];

    /**
     * @var array 内存记录
     */
    public static $memory = [];

    /**
     * @var array 内存记录日志
     */
    public static $memory_log = [];

    /**
     * 安全过滤tag名字
     * 只保留中文、数字、字母、下划线
     * @param string $alias 关联tag名
     * @return string
     */
    public static function safeFilter($alias)
    {
        $pattern = '/[\x{4e00}-\x{9fa5}a-zA-Z0-9_]/u';
        preg_match_all($pattern, $alias, $result);

        return implode('', $result[0]);
    }

}