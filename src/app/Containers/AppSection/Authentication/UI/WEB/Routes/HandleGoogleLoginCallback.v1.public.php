<?php

use App\Containers\AppSection\Authentication\UI\WEB\Controllers\GoogleloginController;
use Illuminate\Support\Facades\Route;

Route::get('login/google/callback', [GoogleloginController::class, 'handleCallback']);

