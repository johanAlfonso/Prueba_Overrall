<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show()
    {
        if(Auth::check()) {
            return redirect('/home');
        }
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->userRepository->create($request->validated());
            });
            return redirect('/')->with('success', 'Account created successfully');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occurred');
        }
    }
}
