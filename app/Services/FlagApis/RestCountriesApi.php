<?php

namespace App\Services\FlagApis;

use App\DTO\FlagDTO;
use Exception;
use Illuminate\Support\Facades\Http;

class RestCountriesApi implements FlagApiInterface
{
    const API_URL = 'https://restcountries.com/v3.1/all';

    public function getFlags(): array|FlagDTO
    {
        try {
            $response = Http::get(self::API_URL);
            $status = $response->status();

            if ($status !== 200) {
                // TODO log error
                return [];
            }

            $data = $response->json();
            $flags = $this->transformToDTO($data);

            return $flags;
        } catch (Exception $e) {
            // TODO log error
            return [];
        }
    }

    protected function transformToDTO(array $data): array|FlagDTO
    {
        $flags = [];

        foreach ($data as $flag) {
            $flags[] = new FlagDTO(
                $flag['name']['common'],
                $flag['flags']['svg']
            );
        }

        return $flags;
    }
}