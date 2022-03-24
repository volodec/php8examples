<?php

namespace App\Http\Controllers;

use App\Services\AnyService;

/**
 * @todo Контроллер
 */
class HelloController extends Controller
{
    public function index()
    {
        return (new AnyService())->getConfig();
    }
}
