<?php

namespace App\Services;

use App\Services\FlagApis\FlagApiInterface;

class FlagService
{
    public function __construct(protected FlagApiInterface $flagApi, protected RedisRepository $redisRepository)
    {
    }

    public function getFlags()
    {
        $flags = $this->redisRepository->get('flags');
        if (!$flags) {
            $flags = $this->flagApi->getFlags();
            $this->redisRepository->set('flags', json_encode($flags));
        } else {
            $flags = json_decode($flags, true);
        }

        return $flags;
    }
}
