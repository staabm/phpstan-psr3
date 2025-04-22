<?php

namespace SymfonyExample;

use Psr\Log\LoggerInterface;

function wrong(LoggerInterface $logger, string $s, bool $b)
{
    $logger->info('I just got the logger '. $s);
    $logger->error("An error occurred $b");

    // log messages can also contain placeholders, which are variable names
    // wrapped in braces whose values are passed as the second argument
    $logger->debug('User '. getUserId() .' has logged in');

    $logger->critical('I left the oven on!', [
        // include extra "context" info in your logs
        'cause' => 'in_hurry',
    ]);

    $logger->info("Failed user login for {$_POST['username']}.");
}

function good(LoggerInterface $logger)
{
    $logger->info('I just got the logger');
    $logger->error('An error occurred');

    // log messages can also contain placeholders, which are variable names
    // wrapped in braces whose values are passed as the second argument
    $logger->debug('User {userId} has logged in', [
        'userId' => getUserId(),
    ]);

    $logger->critical('I left the oven on!', [
        // include extra "context" info in your logs
        'cause' => 'in_hurry',
    ]);

    $logger->info("Failed user login for {username}.", [
        'username' => $_POST['username'],
    ]);

    // ...
}

function getUserId(): int {
    return 42;
}
