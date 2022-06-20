<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class LeaveController extends BaseController
{
    public function index() {
        $this->setPageTitle('Leave', 'Leave Report');
        return view('Manage.pages.Leave.index');
    }
}
