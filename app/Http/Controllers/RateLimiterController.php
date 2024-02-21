<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RateLimiterController extends Controller
{
    public function index(){
        return view('index')->render();
    }

    public function continueSession(){
        return response()->json([
            'message' => 'session successfuly continued'
        ]);
    }

    public function closeSession (Request $request){
        Session::remove('currentSession:'. $request->ip());

        return response()->json([
            'message' => 'current session closed successfully'
        ]);
    }
}
