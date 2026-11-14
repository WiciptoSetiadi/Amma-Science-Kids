<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetController extends Controller
{
    /**
     * Display the form to request a password reset link.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Send a reset link to the given user.
     *
     * @throws ValidationException
     */
    public function store(ForgotPasswordRequest $request): RedirectResponse
    {
        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Tautan untuk mengatur ulang kata sandi telah dikirim ke email Anda.');
        }

        throw ValidationException::withMessages([
            'email' => 'Kami tidak dapat menemukan pengguna dengan alamat email tersebut.',
        ]);
    }

    /**
     * Display the password reset view.
     */
    public function edit(Request $request, string $token): View
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => (string) $request->query('email', ''),
        ]);
    }

    /**
     * Reset the given user's password.
     *
     * @throws ValidationException
     */
    public function update(ResetPasswordRequest $request): RedirectResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password): void {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Kata sandi berhasil diperbarui! Silakan masuk dengan kata sandi baru Anda.');
        }

        throw ValidationException::withMessages([
            'email' => 'Tautan atur ulang kata sandi tidak valid atau sudah kedaluwarsa.',
        ]);
    }
}

