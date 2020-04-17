<?php


namespace App\Services\RedisServices;


use EasySwoole\Redis\Config\RedisConfig;
use EasySwoole\Redis\Exception\RedisException;
use EasySwoole\Redis\Redis;

class Test
{
    public function test()
    {
        $redis = new Redis(new RedisConfig([
            'host' => '127.0.0.1',
            'port' => '6379',
        ]));
        try {
            $redis->set('aaa', 222);
        } catch (RedisException $e) {
            echo $e->getMessage();
        }
        return $redis->get('aaa');
    }

    public function test2()
    {
    }
}