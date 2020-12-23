<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    { {
            if ($request->user()->hasRole('teacher')) {
                return view('teacher.dashboard');
            }
            if ($request->user()->hasRole('user')) {
                return view('home');
            }
        }
    }
}
