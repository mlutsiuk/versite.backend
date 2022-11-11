<?php

use App\Containers\AppSection\Authentication\UI\WEB\Controllers\GoogleLoginController;
use Illuminate\Support\Facades\Route;

Route::get('login/google/callback', [GoogleLoginController::class, 'handleCallback']);

