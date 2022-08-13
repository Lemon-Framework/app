<?php

use App\Controllers\Welcome;
use Lemon\Route;

Route::get('/', [new Welcome(), 'handle']);
