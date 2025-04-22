<?php

declare(strict_types=1);

namespace staabm\PHPStanPsr3\Rules;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<MessageInterpolationRule>
 */
final class MessageInterpolationRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new MessageInterpolationRule();
    }

    public function testSymfonyExample(): void
    {
        $this->analyse([__DIR__ . '/data/symfony-example.php'], [
            [
                'Using interpolated strings in log messages is potentially a security risk.',
                9,
            ],
            [
                'Using interpolated strings in log messages is potentially a security risk.',
                10,
            ],
            [
                'Using interpolated strings in log messages is potentially a security risk.',
                14,
            ],
            [
                'Using interpolated strings in log messages is potentially a security risk.',
                21,
            ],
        ]);
    }

    public function testMonologExample(): void
    {
        $this->analyse([__DIR__ . '/data/monolog-example.php'], [
            [
                'Using interpolated strings in log messages is potentially a security risk.',
                16,
            ],
            [
                'Using interpolated strings in log messages is potentially a security risk.',
                17,
            ],
            [
                'Using interpolated strings in log messages is potentially a security risk.',
                20,
            ],
        ]);
    }

    public function testLaravelExample(): void
    {
        $this->analyse([__DIR__ . '/data/laravel-facade-example.php'], [
            [
                'Using interpolated strings in log messages is potentially a security risk.',
                8,
            ],
        ]);
    }

    public function testRedaxo(): void
    {
        if (PHP_VERSION_ID >= 80000) {
            $this->markTestSkipped('Test does not support PHP 8.0.');
        }

        require_once __DIR__ . '/../../vendor/redaxo/source/redaxo/src/core/lib/base/factory_trait.php';
        require_once __DIR__ . '/../../vendor/redaxo/source/redaxo/src/core/lib/util/logger.php';

        $this->analyse([__DIR__ . '/data/redaxo-example.php'], [
            [
                'Using interpolated strings in log messages is potentially a security risk.',
                8,
            ],
        ]);
    }
}
