<?php

// app/Http/Controllers/ImpersonationController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ImpersonationController extends Controller
{
    public function impersonate($userId)
    {
        $user = User::findOrFail($userId);

        session()->put('impersonate', Auth::id());
        Auth::login($user);

        return redirect('/home')->with('message', 'You are now impersonating ' . $user->name);
    }

    public function leave()
    {
        $adminId = session()->pull('impersonate');

        if ($adminId) {
            Auth::loginUsingId($adminId);
            return redirect('/admin')->with('message', 'You are now back as Admin.');
        }

        return redirect('/home')->with('error', 'Not impersonating anyone.');
    }
}
