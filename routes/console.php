<?php

use Illuminate\Support\Facades\Artisan;

artisan::command('inspire', function () {
    $this->comment(PHP_EOL."The only limit to our realization of tomorrow is our doubts of today.".PHP_EOL);
})->describe('Display an inspiring quote');
