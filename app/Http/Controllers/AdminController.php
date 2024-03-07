<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SubjectUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

    public function regist_admin_page(){

        return view("auth.register_admin");
    }
        public function regist_admin(Request $request){

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'is_actev' => 'nullable|boolean',
                'is_admin' => 'nullable|boolean',
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'is_actev' => true,
                'is_admin' => true,

            ]);
            return redirect()->route('user_home');
    }









}
