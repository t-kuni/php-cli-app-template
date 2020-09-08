<?php

namespace TKuni\PhpCliAppTemplate\Infrastructure\interfaces;

interface IArgsAdapter
{
    public function hasIP();

    public function getIP();

    public function getFilePath();
}