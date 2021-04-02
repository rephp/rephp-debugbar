<?php
namespace rephp\debugbar;

use rephp\debugbar\interfaces\debugInterface;
use rephp\debugbar\logic\data;
use rephp\debugbar\logic\get;
use rephp\debugbar\logic\set;

/**
 * rephp debugbar
 * @method boolean info($msg);
 * @method boolean error($msg);
 * @method boolean log($msg);
 * @method boolean msg($msg);
 * @method boolean time($name);
 * @method boolean memery($name);
 * @package rephp\debugbar
 */
final class debugbar implements debugInterface
{

    /**
     * 初始化bug设置
     * @return boolean
     */
    public function __construct()
    {
        $this->time(data::APP_LIFE_ALIAS);
        $this->memery(data::APP_LIFE_ALIAS);
    }

    /**
     * 运行
     * @param array $info debug信息
     * @return string
     */
    public function run($info = '')
    {
        //判断环境是cli还是web
        $config     = require 'config/config.php';
        $isCliModel = defined('CLI_URI') ? true : $config['is_cli'];
        //判断调用驱动
        $bootstrap  = 'rephp\\debugbar\\bootstrap\\' . ($isCliModel ? 'cliBootStrap' : 'consoleBootStrap');
        //获取日志信息
        if(empty($info)){
            //总计运行时间
            $this->time(data::APP_LIFE_ALIAS);
            $this->memery(data::APP_LIFE_ALIAS);
            empty($info) && $info = get::getAllInfo();
        }

        return (new $bootstrap())->run($info);
    }

    /**
     * 调用设置方法
     * @param string $name   方法名
     * @param array  $params 参数
     * @return mixed
     * @throws \Exception
     */
    public function __call($name, $params)
    {
        if (!method_exists('set', $name)) {
            throw new \Exception('Method ' . $name . ' is not exists in class:' . $name);
        }

        return set::$name($params);
        /*
        $rm = new ReflectionMethod('set', $name);
        $isStatic = $rm->isStatic();

        return $isStatic ? set::$name($params) : (new set())->$name($params);
        */
    }

    /**
     * 调用设置方法
     * @param string $name   方法名
     * @param array  $params 参数
     * @return mixed
     * @throws \Exception
     */
    public static function __callStatic($name, $params)
    {
        if (!method_exists('set', $name)) {
            throw new \Exception('Method ' . $name . ' is not exists in class:' . $name);
        }

        return set::$name($params);
    }


}