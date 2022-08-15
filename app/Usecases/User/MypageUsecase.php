<?php

namespace App\Usecases\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Usecases\Payload as Payload;
use Illuminate\Support\Facades\Auth;

class MypageUsecase extends Controller
{

    /**
     * @param User $user
     * @return Payload
     */
    public function run(User $user): Payload
    {
        $payload = new Payload();

        $user = Auth::user();

        return $payload->setResult([
            'user' => $user
        ]);
    }
}
