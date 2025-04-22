<?php

namespace LaravelFacadeLogExample;

use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Log;

function error(string $message) {
    Log::error('An error occurred: '. $message);
}
function logMessage(string $id): void {
    Log::info('User {id} failed to login.', ['id' => $id]);
}

function foo(LogManager $logger, string $id, int $iid): void
{
    $logger->info('User id' . $id);
    $logger->info('User id' . $iid);
}
