<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Payment;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        if($request->wantsJson()) {
            return new JsonResponse([], 204);
        }
        else{
            $user = Auth::user();
            $payment = Payment::where('user_id', $user->id)->first();

            if ($payment) {
                return redirect()->route('upload-video', ['plan' => $payment->plan]);
            } else {
                return redirect()->route('payment');
            }
        }

        // return $request->wantsJson()
        //             ? new JsonResponse([], 204)
        //             : redirect()->intended($this->redirectPath());
    }

    protected function authenticated($request, $user){
        // dd( $user->getRoleNames()->first() );
        if($user->hasRole('admin')){
            return redirect('/admin/videos');
        } else {

            $payment = Payment::where('user_id', $user->id)->first();

            if ($payment) {
                return redirect()->route('upload-video', ['plan' => $payment->plan]);
            } else {
                return redirect()->route('payment');
            }
            return redirect('/home');
        }
    }
}
