<?php

namespace rephp\debugbar\bootstrap;

use rephp\debugbar\interfaces\debugInterface;

/**
 * web debug bootstrap
 */
final class cliBootstrap implements debugInterface
{

    /**
     * 运行
     * @param  array  $info  debug信息
     * @return string
     */
    public function run($info)
    {
        $info['list_info'] = (array)$info['list_info'];
        foreach($info['list_info'] as $val){
            print_r($val);
        }
        //3.计算执行总时间
        echo '运行时间:' . $info['other_info']['runtime'] . '<br>' . "\n";
        //4.计算执行消耗内存
        echo '内存开销:' . $info['other_info']['memory'] . '<br>' . "\n";
    }

}