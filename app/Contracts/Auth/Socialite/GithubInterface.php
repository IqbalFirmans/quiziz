<?php

namespace App\Contracts\Auth\Socialite;

interface GithubInterface{
    public function callback_github();
    public function redirect_github();
}


