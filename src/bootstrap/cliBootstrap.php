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
        $result = '-------------------'."\n";
        $info['list_info'] = (array)$info['list_info'];
        foreach($info['list_info'] as $val){
            $result .= $val['name'].':'."\n";
            $result .= print_r(['data'], 1);
            $result .= '-------------------'."\n";
        }
        //3.计算执行总时间
        $result .= '运行时间:' . $info['other_info']['runtime']. "\n";
        $result .= '-------------------'."\n";
        //4.计算执行消耗内存
        $result .= '内存开销:' . $info['other_info']['memory']. "\n";
        $result .= '-------------------';

        return $result;
    }

}