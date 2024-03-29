<?php

namespace Wojitech\LaravelSmartAdmin\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;

class LaravelSmartAdminController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Title')
            ->description('Description')
            ->body(view('laravelsmartadmin::index'));
    }
}