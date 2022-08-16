<?php

namespace App\Usecases\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Usecases\Payload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUsecase extends Controller
{
    /**
     * @param Request $request
     * @param User $user
     * @return Payload
     */
    public function run(Request $request, User $user): Payload
    {
        $payload = new Payload();

        $user = Auth::user();
        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->email = $request->input('email') ? $request->input('email') : $user->email;
        $user->update();

        return $payload;
    }
}
