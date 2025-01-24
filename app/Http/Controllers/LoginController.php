<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginPage(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('user.login');
    }

    public function registerPage(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('user.register');
    }

    public function authenticate(Request $request)
    {
        $request->session()->flash('message', 'TryLogin');

        $validatedRequest = $request->validate([
            "username" => ['required', 'string'],
            'password' => ['required'],
        ]);

        $credentials= [
            'password' => $validatedRequest["password"],
        ];

        if ( filter_var($validatedRequest['username'], FILTER_VALIDATE_EMAIL) ) {
            $credentials["email"] = $validatedRequest['username'];
        }
        else{
            $credentials["username"] = $validatedRequest["username"];
        }

        if (Auth::attempt($credentials)) {
            /**
             * @var User $user
             */
            $user = Auth::user();
            $user->setLastAccess(Carbon::now())
                ->save();
            $request->session()->regenerate();
            return redirect()->route('user.home');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])
        ->onlyInput('username');
    }

    public function register(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->session()->flash('message', 'TryRegister');

        $validatedRequest = $request->validate([
            "email" => ['required', 'email', 'unique:users'],
            "username" => ['required', 'string', 'min:3', 'max:30', 'unique:users'],
            "password" => ['required', 'confirmed', 'min:8']
        ]);

        $validatedRequest["password"] = Hash::make($validatedRequest["password"]);
        /**
         * @var User $user
         */
        $user = User::query()->create($validatedRequest);
        $user->setLastAccess(Carbon::now())
            ->save();

        //TODO: Valuate if use password confirmation
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('user.home');
    }

    public function logout(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }

    public function destroy(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        /**
         * @var User $user
         */
        $user = Auth::user();
        $user->delete();
        return redirect()->route('user.login');
    }
}
