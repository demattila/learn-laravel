<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AwesomeService;

class DemoController extends Controller
{

    public function __invoke(AwesomeService $awesome_service)
    {
        $awesome_service->doAwesomeThing();
    }

}
