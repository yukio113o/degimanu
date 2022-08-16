<?php

namespace App\Usecases\User;

use App\Http\Controllers\Controller;
use App\Usecases\Payload;
use Illuminate\Support\Facades\Auth;

class MypageUsecase extends Controller
{

    /**
     * @return Payload
     */
    public function run(): Payload
    {
        $payload = new Payload();

        $user = Auth::user();

        return $payload->setResult([
            'user' => $user
        ]);
    }
}
