<?php

namespace App\Services;

use App\Interfaces\FlagApiInterface;
use App\DTO\FlagDTO;

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
            $flagsPretty = $this->transformToDTO($flags);
            $this->redisRepository->set('flags', json_encode($flagsPretty));
        } else {
            $flagsPretty = json_decode($flags, true);
        }

        return $flagsPretty;
    }

    protected function transformToDTO(array $flags): array
    {
        $flagsDTO = [];

        foreach ($flags as $flag) {
            $flagsDTO[] = new FlagDTO(
                $flag['name']['common'],
                $flag['flags']['svg']
            );
        }

        return $flagsDTO;
    }
}
