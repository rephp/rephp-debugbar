<?php

namespace rephp\debugbar\bootstrap;

use rephp\debugbar\interfaces\debugInterface;

/**
 * console debug bootstrap
 */
final class consoleBootstrap implements debugInterface
{

    /**
     * 运行
     * @param  array  $info  debug信息
     * @return string
     */
    public function run($info)
    {
        $result = '<script>'."\n";
        $info['list_info'] = (array)$info['list_info'];
        foreach($info['list_info'] as $val){
            $result .= 'console.log(\''.$val['name'].':'."');\n";
            $result .= 'console.log('.json_encode($val['data']).");\n";
            $result .= "console.log(\"-------------------\");\n";
        }
        //3.计算执行总时间
        $result .= 'console.log("运行时间:' . $info['other_info']['runtime']. "\\\n\");";
        $result .= "console.log(\"-------------------\");\n";
        //4.计算执行消耗内存
        $result .= 'console.log("内存开销:' . $info['other_info']['memory']. "\\\n\");";
        $result .= "console.log(\"-------------------\");\n";
        $result .= '</script>'."\n";
        return $result;
    }

}