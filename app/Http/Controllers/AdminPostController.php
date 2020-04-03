<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        {
            if ($request->user()->hasRole('admin')) {
                return view('admin.dashboard');
            }
            if ($request->user()->hasRole('user')) {
                return view('welcome');
            }
        }
    }
}
