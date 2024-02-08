<?php

namespace App\Contracts\Auth;

interface SocialiteInterface{
    public function redirect($with);
    public function callback($with);
}


