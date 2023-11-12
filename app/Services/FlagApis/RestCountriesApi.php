<?php

namespace App\Services\FlagApis;

use Exception;
use Illuminate\Support\Facades\Http;
use App\Interfaces\FlagApiInterface;

class RestCountriesApi implements FlagApiInterface
{
    const API_URL = 'https://restcountries.com/v3.1/all';

    public function getFlags(): array
    {
        try {
            $response = Http::get(self::API_URL);
            $status = $response->status();

            if ($status !== 200) {
                // TODO log error
                var_dump($status);
                return [];
            }

            $data = $response->json();
            return $data;
        } catch (Exception $e) {
            // TODO log error
            var_dump($e->getMessage());
            return [];
        }
    }

}