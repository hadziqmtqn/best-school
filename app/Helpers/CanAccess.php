<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class CanAccess
{
    public static function to($permission): bool
    {
        return Auth::check() && Auth::user()->can($permission);
    }
}
