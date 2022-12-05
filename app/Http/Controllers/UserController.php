<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegistrationValidation;
use App\Http\Requests\UserEditValidator;
use App\Http\Requests\UserUpdateValidator;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Переход на страницу регистрации
     */
    public function register()
    {
        return view('users.register');
    }

    /**
     * @param RegistrationValidation $request
     * @return \Illuminate\Http\RedirectResponse
     * Функция регистрации(создание нового пользователя)
     */
    public function registerPost(RegistrationValidation $request)
    {
        $requests = $request->validated();
        $requests['password']=Hash::make($requests['password']);
        User::create($requests);
        return redirect()->route('login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Переход на страницу входа(login)
     */
    public function login()
    {
        return view('users.login');

    }

    /**
     * @param LoginValidation $request
     * @return \Illuminate\Http\RedirectResponse
     * Функция логина
     */
    public function loginPost(LoginValidation $request)
    {
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return back()->with(['success'=>'true']);
        }
        return back()->withErrors(['auth'=>'Логин или пароль не верный!']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Выход из пользователя
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('welcome');
    }

}
