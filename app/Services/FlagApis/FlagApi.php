<?php

namespace App\Services\FlagApis;

class FlagApi implements FlagApiInterface
{
    public function getFlags(): array
    {
        return [
            [
                "name" => "flag1",
                "description" => "flag1 description"
            ],
            [
                "name" => "flag2",
                "description" => "flag2 description"
            ],
            [
                "name" => "flag3",
                "description" => "flag3 description"
            ]
        ];
    }
}