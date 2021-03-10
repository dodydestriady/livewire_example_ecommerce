<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController {

    public function __construct()
    {
        $finder = new \Illuminate\View\FileViewFinder(app()['files'], array(resource_path().'/views/seller'));
        View::setFinder($finder);
    }

}