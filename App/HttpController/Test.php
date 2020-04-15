<?php


namespace App\HttpController;


class Test extends Base
{
    public function ttt()
    {
        $this->writeJson(200, [], 'ok');
    }
}