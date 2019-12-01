<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivationService;

class UserActivationController extends Controller
{
    //

    protected $activationService;

    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
    }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect()->route('my_account')->with('success', 'YOUR ACCOUNT HAS BEEN ACTIVATED!');;
        }
        abort(404);
    }
}
