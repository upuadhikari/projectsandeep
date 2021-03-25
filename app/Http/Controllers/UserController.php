<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {  
    //     if (!Auth::user()->role == 3) {
    //         abort(404);
    //     }
    //         return $next($request);
    //     });
    // }

    public function editUser($id){
        $user = User::where('id', $id)->first();
        return view('user.form',compact('user'));
    }

    public function index(Request $request){
        $data = User::orderBy('id','desc')->get();
        return view('userview', compact('data'));
    //return view('userview', ['users' => 'data']);
    //return view(‘userview’)
            // ->with('users', 'data')
            // ->with('name', 'value')
    //return view('userview', compact('data1','data2','data3'));


}

}
