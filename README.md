**rephp-debugbar**
这是一款适合中国php程序员使用的debugbar。

主要分为数据收集接口和展示接口:
**收集接口分为：**
调试消息接收
sql信息接收
计时信息接收
事件消息接收
内存消息接收
---
**展示接口**为唯一调用入口

**一、安装**

composer require "rephp/rephp-debugbar"

**二、使用**
1. 随时以同一名字请求计时，第一次请求自动保存记录，第二次请求则自动计算两同名请求之间运行时长
   用法:
   $debugbar = new \rephp\debugbar\debugbar();
   $debugbar->time('test');
   //...
   $debugbar->time('test');
   print_r( \rephp\debugbar\logic\get::getTime('test'));
   
 2. 同理内存也是同样处理，即第一次请求保存请求记录内存状态，第二次请求则自动计算两同名请求之间运行内存变化。
    用法：
    $debugbar = new \rephp\debugbar\debugbar();
       $debugbar->memery('test');
       //...
       $debugbar->memery('test');
       print_r(\rephp\debugbar\logic\get::getMemory('test'));
 3. sql信息接收
        $debugbar = new \rephp\debugbar\debugbar();
        $debugbar->sql('test');
        print_r(\rephp\debugbar\logic\get::getSqlInfo('test'));
        
 4. 事件信息接收
          $debugbar = new \rephp\debugbar\debugbar();
          $debugbar->event('test', ['事件信息记录']);
          print_r(\rephp\debugbar\logic\get::getEventInfo('test'));
  5. 调试信息接收
            $debugbar = new \rephp\debugbar\debugbar();
            $debugbar->msg('信息记录');
            $debugbar->log('信息记录');
            $debugbar->error('信息记录');
            $debugbar->info('信息记录');
            print_r(\rephp\debugbar\logic\get::getMessageInfo());
----
获取所有数据：
     $debugbar = new \rephp\debugbar\debugbar();
     $info     = $debugbar->run();
     
