<?php

namespace App\Http\Controllers;

use App\Services\ParamsService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public ParamsService $paramsService;

    public function __construct(ParamsService $service)
    {
        $this->paramsService = $service;
    }
}
