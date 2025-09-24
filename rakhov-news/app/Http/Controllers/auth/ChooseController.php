<?php 

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;

class ChooseController extends Controller
{
    public function choose() 
    {
        return view('auth.choose');
    }
}