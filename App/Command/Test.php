<?php


namespace App\Command;


use EasySwoole\EasySwoole\Command\CommandInterface;
use EasySwoole\EasySwoole\Command\Utility;

class Test implements CommandInterface
{

    public function commandName(): string
    {
        return 'test';
    }

    public function exec(array $args): ?string
    {
        while (true) {
            sleep(1);
            echo 'test'.PHP_EOL;
        }
        return null;
    }

    public function help(array $args): ?string
    {
        $logo = Utility::easySwooleLog();
        return $logo."this is test";
    }
}