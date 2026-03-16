<?php

namespace App\Http\Controllers\Cabinet\User\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\User\UpdatePasswordRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    public function index(): Renderable
    {
        return view('cabinet.settings');
    }

    /**
     * @throws AuthenticationException
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user = $request->user();

        $user->update([ // TODO: save with UserService
            'password' => Hash::make($data['password']),
        ]);

        if ($request->boolean('logout_other_sessions')) {
            Auth::logoutOtherDevices($data['current_password']);
        }

        $message = $request->boolean('logout_other_sessions')
            ? 'Password updated. Other sessions were logged out.'
            : 'Password updated.';

        return back()->with('success', $message);
    }
}
