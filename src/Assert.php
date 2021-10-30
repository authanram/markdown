<?php

declare(strict_types=1);

namespace Authanram\Markdown;

use Webmozart\Assert\InvalidArgumentException;

class Assert extends \Webmozart\Assert\Assert
{
    public static function url(
        string $subject,
        string $message = 'Expected url, got: "%s".',
    ): bool {
        filter_var($subject, FILTER_VALIDATE_URL) === false
            ? throw new InvalidArgumentException(sprintf($message, $subject))
            : null;

        return true;
    }
}
