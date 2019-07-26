<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request){

        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], false, false))
        {
          $user = User::where('email', $request->email)->first();

          if($user->is_administrator())
          {
              return redirect('administrator');
          }

          return redirect('user');
        }

        return redirect()->back();
    }
}
