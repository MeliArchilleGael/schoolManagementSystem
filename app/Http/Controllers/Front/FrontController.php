<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FrontController extends Controller
{
    //

    public function calender(): Response
    {
        return Inertia::render('Utils/calendar');
    }

    public function todolist(): Response
    {
        return Inertia::render('Utils/todolist');
    }
}
