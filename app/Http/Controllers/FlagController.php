<?php

namespace App\Http\Controllers;

use App\Services\FlagService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class FlagController extends BaseController
{
    public function __construct(protected FlagService $flagService)
    {
    }

    public function list(): JsonResponse
    {
        $flags = $this->flagService->getFlags();

        return response()->json([
            "data" => $flags
        ]);
    }

}
