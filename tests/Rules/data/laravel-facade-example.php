<?php

namespace LaravelFacadeLogExample;

use Illuminate\Support\Facades\Log;

function error(string $message) {
    Log::error('An error occurred: '. $message);
}
function logMessage(string $id): void {
    Log::info('User {id} failed to login.', ['id' => $id]);
}

