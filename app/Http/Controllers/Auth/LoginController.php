<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller {

    use ThrottlesLogins;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function show() {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param App\Http\Request\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request){

        // If login limit reached, do your thing
        if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if(!Auth::attempt($request->only('email', 'password'))) {

            // Incremet throttle var
            $this->incrementLoginAttempts($request);

            // Throw exception of login failure
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ])->redirectTo('/login');
        }

        // Regenerate the session
        $request->session()->regenerate();

        // Login Successful, clear throttle
        $this->clearLoginAttempts($request);

        // Redirect time
        return redirect('/admin');
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        // Log the user out
        Auth::logout();

        // Flush Session
        $request->session()->invalidate();

        // Redirect back home
        return redirect('/');
    }

    /**
     * Required by ThrottlesLogins trait.
     *
     * @return string
     */
    protected function username() {
        return 'email';
    }
}
