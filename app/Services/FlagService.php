<?php

namespace App\Services;

use App\Services\FlagApis\FlagApiInterface;

class FlagService
{
    public function __construct(protected FlagApiInterface $flagApi)
    {
    }

    public function getFlags()
    {
        $this->flagApi->getFlags();
    }
}