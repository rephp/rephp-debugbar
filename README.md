**rephp-debugbar**
这是一款适合中国php程序员使用的debugbar。

主要分为数据收集接口和展示接口:

# 结构
+ 保存数据接口
    + 保存调试消息
        * msg级消息 -  $debugbar->msg('信息记录');
	* log级消息 -  $debugbar->log('信息记录');
	* error级消息 -  $debugbar->error('信息记录');
	* info级消息 -  $debugbar->info('信息记录');
    + 保存sql信息  - $debugbar->time('select * from test_table where id<100', 0.03);
    + 保存计时信息 - $debugbar->time('test');
    + 保存事件消息  - $debugbar->event('test' , ['事件数据信息']);
    + 保存内存消息  - $debugbar->memery('test');
+ 获取数据接口
    - 统一获取所有消息入口
        * 获取运行时间 - get::getTime($tagName)
        * 获取运行内存 - get::getMemory($tagName)
        * 获取调试消息,传参为空代表所有消息 - get::getMessageInfo($level='') 
        * 获取sql信息 - get::getSqlInfo()
        * 获取事件消息 - get::getEventInfo()
        * 获取基本信息 - get::getBasicInfo()
        * 获取加载文件列表 - get::getFileInfo()
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
        $debugbar->sql('select * from test_table where id<100', 0.03);
        print_r(\rephp\debugbar\logic\get::getSqlInfo('test'));
        
 4. 事件信息接收
          $debugbar = new \rephp\debugbar\debugbar();
          $debugbar->event('test', ['事件信息记录']);
          print_r(\rephp\debugbar\logic\get::getEventInfo());
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
     
