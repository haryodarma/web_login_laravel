<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{

    private array $users =
        [
            'admin' => 'admin',
            'haryodarma' => 'admin'
        ]
    ;

    public function login(string $username, string $password): bool
    {
        if (!isset($this->users[$username])) {
            return false;
        }

        $corrrectPassword = $this->users[$username];
        return $corrrectPassword == $password;
    }

}