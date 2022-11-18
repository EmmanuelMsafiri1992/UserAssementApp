<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //Show the login form for all users
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        //Validate login Data
        $request->validate([
            'email' => 'required|max:50',
            'password'=>'required',
        ]);

        //Attempt to login
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],
        $request->remember)) {
            //Redirect to dashboard
            session()->flash('success', 'Successfully Logged in! ');
            return redirect()->route('admin.dashboard');
        } else {
            //Seach using username
            if (Auth::guard('admin')->attempt(['username' =>
                $request->email, 'password' =>
                $request->password], $request->remember)) {
                session()->flash('success', 'Successfully Logged in !');
                return redirect()->route('admin.dashboard');
            }
            //error
            session()->flash('error', 'Invalid email and password');
            return back();
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
