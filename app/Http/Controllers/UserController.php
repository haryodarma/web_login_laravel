<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{

    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    // Show Login Page
    public function login(): Response
    {

        return response()->view('user.login', ["tittle" => "Login Page"]);
    }

    // Login Action
    public function doLogin(Request $req): Response|RedirectResponse
    {

        // $service = App::make(UserService::class);
        $user = $req->input("user");
        $password = $req->input("password");

        if (empty($user) || empty($password)) {
            return response()->view("user.login", ['tittle' => 'Login Page', 'error' => "Username and Password is required"]);
        }

        if ($this->service->login($user, $password)) {
            $req->session()->put("user", $user);
            return redirect("/");
        }

        return response()->view("user.login", ['tittle' => 'Login Page', 'error' => "Username or Password is wrong"]);

    }

    // LogOut Action
    public function doLogout($request)
    {

        $request->session()->forget("user");
        return redirect("/");


    }
}
