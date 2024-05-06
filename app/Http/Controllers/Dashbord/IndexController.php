<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view(  'Dashboard.index');
    }
}
