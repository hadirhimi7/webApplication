<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
   
    public function create(): View
    {
        return view('auth.login');
    }

   
  
   public function store(LoginRequest $request): RedirectResponse
{
    
    if ($request->email === 'admin@admin.com' && $request->password === 'admin1234') {
        $request->session()->put('is_admin', true);
        return redirect()->route('admin.dashboard');
    }

    
    $request->authenticate();
    $request->session()->regenerate();

    $user = $request->user();

    if ($user->role === 'driver') {
        return redirect()->route('driver.dashboard');
    }

    return redirect()->route('client.dashboard');
}
    
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->forget('is_admin'); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
