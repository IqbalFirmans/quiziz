<?php

namespace App\Contracts\Auth;

interface SocialiteInterface{
    public function callback();
    public function redirect();
}


