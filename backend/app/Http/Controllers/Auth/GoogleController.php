<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\GoogleLoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Send the browser to Google's login page.
     */
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email'])
            ->redirect();
    }

    /**
     * Google sends the user back here after they approve.
     */
    public function callback(GoogleLoginService $login): RedirectResponse
    {
        $google = Socialite::driver('google')->user();
        $user = $login->findOrCreate($google);

        Auth::login($user, remember: true);

        return redirect()->away(config('app.frontend_url'));
    }
}
