<?php


namespace TKuni\PhpCliAppTemplate\Infrastructure;


use Garden\Cli\Cli;
use TKuni\PhpCliAppTemplate\Infrastructure\interfaces\IArgsAdapter;

class ArgsAdapter implements IArgsAdapter
{
    private $args;

    public function __construct($argv)
    {
        $cli = new Cli();

        $cli->description('ツールの説明文')
            ->opt('ip:i', 'オプションの説明', false, 'string')
            ->arg('file', '引数の説明', true);

        $this->args = $cli->parse($argv, false);
    }

    public function hasIP()
    {
        return $this->args->hasOpt('ip');
    }

    public function getIP()
    {
        return $this->args->getOpt("ip");
    }

    public function getFilePath()
    {
        return $this->args->getArg('file');
    }
}