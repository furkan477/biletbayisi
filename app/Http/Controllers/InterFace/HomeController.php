<?php

namespace App\Http\Controllers\InterFace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("interface.pages.index");
    }
}
