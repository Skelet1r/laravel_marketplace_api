<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function createAccount(Request $request)
    {
        return $this->authService->createAccount($request);
    }

    public function signIn(Request $request)
    {
        return $this->authService->signIn($request);
    }

    public function logout(Request $request)
    {
        return $this->authService->logout($request);
    }

    public function forgotPassword(Request $request)
    {
        return $this->authService->forgotPassword($request);
    }

    public function resetPassword(Request $request)
    {
        return $this->authService->resetPassword($request);
    }

    public function setRole(Request $request, User $user)
    {
        return $this->authService->setRole($request, $user);
    }
}
