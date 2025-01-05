<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\UserService;

class UserServiceTest extends TestCase
{

    public UserService $service;

    public function setUpTest()
    {

        $this->service = $this->app->make(UserService::class);
        self::assertTrue(true);
    }

    public function testLogin()
    {
        $this->service = $this->app->make(UserService::class);
        self::assertTrue($this->service->login('haryodarma', 'admin'));
        self::assertFalse($this->service->login('gaadauser', 'gaadauser'));
        self::assertFalse($this->service->login('admin', 'salah'));
    }


}
