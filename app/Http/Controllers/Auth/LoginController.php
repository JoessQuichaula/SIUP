<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request){


        $input = $request->all();

        $this->validate($request, [
            'telemovel' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->telemovel, FILTER_VALIDATE_EMAIL) ? 'email' : 'telemovel';
        if(auth()->attempt(array($fieldType => $input['telemovel'], 'password' => $input['password'])))
        {
            return redirect()->route('home');
        }else{
            return  $fieldType;
            /*
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');*/
        }
        /*
        $loginType = request()->input('telemovel');
        $this->telemovel = filter_var($loginType,FILTER_VALIDATE_EMAIL) ? 'email':'telemovel';
        request()->merge([$this->telemovel => $loginType ]);

        return property_exists($this,'telemovel') ? $this->telemovel : 'email';
        */

    }

}
