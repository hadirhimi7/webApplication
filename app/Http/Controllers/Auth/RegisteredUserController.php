<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Driver; // ✅ Added for Driver model
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:client,driver'],
            'vehicle_type' => ['required_if:role,driver', 'string', 'nullable'],
            'plate_number' => ['required_if:role,driver', 'string', 'nullable'],
            'license_details' => ['required_if:role,driver', 'string', 'nullable'],
            'pricing_model' => ['required_if:role,driver', 'in:fixed,per_km', 'nullable'],
        ]);



        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // If the user is a driver, create their driver profile
        if ($request->role === 'driver') {
            Driver::create([
                'user_id' => $user->id,
                'vehicle_type' => $request->vehicle_type,
                'plate_number' => $request->plate_number,
                'license_details' => $request->license_details,
                'pricing_model' => $request->pricing_model,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
    }
}
