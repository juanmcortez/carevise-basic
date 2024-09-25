<?php

namespace App\Http\Controllers\Main;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Single Action Controllers - Dashboard landing
     */
    public function __invoke(): View
    {
        return view('pages.main.dashboard');
    }
}
