<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Vizir\KeycloakWebGuard\Auth\KeycloakWebUserProvider as BaseProvider;

class KeycloakWebUserProvider extends BaseProvider
{
    /**
     * Rehash the user's password if required and supported.
     * รองรับฟังก์ชันใหม่ของ Laravel 11/12
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @param  bool  $force
     * @return void
     */
    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false): void
    {
        // Keycloak เป็นตัวจัดการรหัสผ่านและ SSO ภายนอก จึงไม่ต้องทำการ rehash ใน Laravel
    }
}
