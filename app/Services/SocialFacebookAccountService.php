<?php

namespace App\Services;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            // $user = User::whereEmail($providerUser->getEmail())->first();

            // if (!$user) {

            $user = User::create([
                'email' => $providerUser->getEmail(),
                'handle' => $providerUser->getName(),
                'name' => $providerUser->getName(),
                'password' => md5(rand(1,10000)),
                'link' => $providerUser->getId()
            ]);
                
            // }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}