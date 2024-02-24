<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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

    /**
     * The user has been authenticated.
     *
     * @param  Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)

    {

        if (auth()->check() && auth()->user()->is_actev == 0) {
            auth()->logout(); // قم بتسجيل الخروج في حالة عدم تحقق الشرط
            return redirect('/waiting'); // يمكنك توجيه المستخدم إلى أي صفحة تحددها هنا
        }
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return redirect('/admin/user_subject'); // يمكنك توجيه المستخدم إلى أي صفحة تحددها هنا
        }

        return redirect('/');
    }
}
