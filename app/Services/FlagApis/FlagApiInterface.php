<?php

namespace App\Services\FlagApis;

use App\DTO\FlagDTO;

interface FlagApiInterface
{
    public function getFlags(): array|FlagDTO;
}