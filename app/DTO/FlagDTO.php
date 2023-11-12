<?php

namespace App\DTO;

class FlagDTO
{
    public string $name;
    public string $image;

    public function __construct(string $name, string $image)
    {
        $this->name = $name;
        $this->image = $image;
    }
}
