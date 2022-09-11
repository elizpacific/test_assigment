<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use App\Models\User;

class UserController extends Controller
{
    public function index(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.list', ['users' => $user->cURLAll()]);
    }

    public function getOne(User $user, $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.transaction', ['transactions' => $user->cURLGetOne($id)]);
    }

    public function log(User $user)
    {
        return $user->cURLLog();
    }
}
