<?php

namespace App\Services;

use App\Interfaces\FlagApiInterface;

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
            $flagsPretty = [];
            foreach ($flags as $flag) {
                $flagsPretty[] = [
                    'name' => $flag['name']['common'],
                    'image' => $flag['flags']['svg']
                ];
            }
            $this->redisRepository->set('flags', json_encode($flagsPretty));
        } else {
            $flagsPretty = json_decode($flags, true);
        }

        return $flagsPretty;
    }
}