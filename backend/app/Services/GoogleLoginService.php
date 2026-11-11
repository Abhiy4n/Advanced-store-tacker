<?php

namespace App\Services;

use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Contracts\User as GoogleUser;
use RuntimeException;

class GoogleLoginService
{
    /**
     * Find or create a local user from a Google profile, then return them.
     */
    public function findOrCreate(GoogleUser $google): User
    {
        $email = strtolower(trim((string) $google->getEmail()));

        if ($email === '') {
            throw new RuntimeException('Google account has no email.');
        }

        return DB::transaction(function () use ($google, $email) {
            $account = SocialAccount::query()
                ->where('provider', 'google')
                ->where('provider_user_id', $google->getId())
                ->first();

            if ($account) {
                return $this->refreshProfile($account->user, $google);
            }

            $user = User::query()->where('email', $email)->first();

            if (! $user) {
                $user = User::query()->create([
                    'name' => $google->getName() ?: $email,
                    'email' => $email,
                    'avatar_url' => $google->getAvatar(),
                    'password' => null,
                    'email_verified_at' => now(),
                ]);
            } else {
                $this->refreshProfile($user, $google);
            }

            $user->socialAccounts()->create([
                'provider' => 'google',
                'provider_user_id' => $google->getId(),
                'provider_email' => $email,
            ]);

            return $user;
        });
    }

    private function refreshProfile(User $user, GoogleUser $google): User
    {
        $user->fill([
            'name' => $google->getName() ?: $user->name,
            'avatar_url' => $google->getAvatar() ?: $user->avatar_url,
        ])->save();

        return $user;
    }
}
