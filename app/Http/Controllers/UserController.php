<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginPage () {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate (Request $request) {
        $credentials = $request->validate([
            'email'     => 'required|email:dns',
            'password'  => 'required|'
        ]);

        if (Auth::attempt($credentials)) {
            
            // untuk mencegah session fixation
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('error', 'The provided credentials do not match in our records');
    }

    public function registerPage () {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function authorization (Request $request) {
        $validationData = $request->validate([
            'fullname'  => 'required|max:255',
            'email'     => 'required|unique:users|email:dns',
            'password'  => 'required|min:3'
        ]);

        $validationData['real_password'] = $validationData['password'];
        $validationData['password'] = bcrypt($validationData['password']);

        User::create($validationData);

        $request->session()->flash('success', 'Register successfully');

        return redirect('/login');
    }

    public function logout (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function detail () {
        
    }
}
