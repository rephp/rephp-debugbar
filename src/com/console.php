<?php

namespace rephp\debugbar\com;

use rephp\debugbar\interfaces\debugInterface;

/**
 * console debug 组件
 */
final class console implements debugInterface
{

    /**
     * 运行
     * @param  array  $info  debug信息
     * @return string
     */
    public function run($info)
    {
        $result = '<script>'."\n";
        $result .= 'console.clear();'."\n";
        $info['list_info'] = (array)$info['list_info'];
        foreach($info['list_info'] as $val){
            $result .= "console.group();\n";
            $result .= 'console.log(\''.$val['name'].':'."');\n";
            $result .= 'console.dir('.json_encode($val['data']).");\n";
            $result .= "console.groupEnd();\n";
            $result .= "console.info(\"-------------------\");\n";
        }
        //3.计算执行总时间
        $result .= 'console.warn("运行时间:' . $info['other_info']['runtime']. "\\\n\");";
        $result .= "console.info(\"-------------------\");\n";
        //4.计算执行消耗内存
        $result .= 'console.warn("内存开销:' . $info['other_info']['memory']. "\\\n\");";
        $result .= "console.info(\"-------------------\");\n";
        $result .= '</script>'."\n";
        return $result;
    }

}