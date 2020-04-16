<?php


namespace App\HttpController;


use EasySwoole\Rpc\Response;
use EasySwoole\Rpc\Rpc;

class Test extends Base
{
    public function ttt()
    {
        $this->writeJson(200, [], 'ok1sss');
    }

    public function testRpc()
    {
        $ret = [];
        $client = Rpc::getInstance()->client();
        /*
         * 调用商品列表
         */
        $client->addCall('goods','list',['page'=>1])
            ->setOnSuccess(function (Response $response)use(&$ret){
                $ret['goods'] = $response->toArray();
            })->setOnFail(function (Response $response)use(&$ret){
                $ret['goods'] = $response->toArray();
            });
        /*
         * 调用信箱公共
         */
        $client->addCall('common','mailBox')
            ->setOnSuccess(function (Response $response)use(&$ret){
                $ret['mailBox'] = $response->toArray();
            })->setOnFail(function (Response $response)use(&$ret){
                $ret['mailBox'] = $response->toArray();
            });
        /*
        * 获取系统时间
        */
        $client->addCall('common','serverTime')
            ->setOnSuccess(function (Response $response)use(&$ret){
                $ret['serverTime'] = $response->toArray();
            });

        $client->exec(2.0);

        $this->writeJson(200, $ret);
    }
}