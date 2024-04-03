<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInFormRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use MoonShine\Models\MoonshineUser;


class SignInController extends Controller
{
    public function page()
    {
        settype($role, "string");
        if(auth()->user()) {
                $role = auth()->user()->role->name;

        }

        return view('auth.login', [
            'role' => $role
        ]);
    }

    public function handle(SignInFormRequest $request): RedirectResponse
    {

        $user = (User::query()->where('email', $request->email)->first()) ?: null;

        if (is_null($user)) {
            flash()->alert('You are not a judge'); // вы не судья
            return redirect()->back(); // intended - назад

        }


        if ($user->role->name == 'judge') {

            if (!auth()->attempt($request->validated())) {
                return back()->withErrors([
                    'email' => 'Error in the E-mail or password field',
                ])->onlyInput('email');
            }

            flash()->info('You are logged in as a judge'); // Вы вошли в систему как судья
            $request->session()->regenerate();
            return redirect()->intended(route('home')); // intended - назад или route

        }



        if ($user->role->name == 'manager') {

            if (!auth()->attempt($request->validated())) {
                return back()->withErrors([
                    'email' => 'Error in the E-mail or password field',
                ])->onlyInput('email');
            }

            flash()->info('You are logged in as a Manager'); // Вы вошли в систему как менеджер
            $request->session()->regenerate();
            return redirect()->intended(route('cabinetManager')); // intended - назад или route

        }





    }



}
