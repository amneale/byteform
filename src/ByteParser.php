<?php

declare(strict_types=1);

namespace Amneale\ByteForm;

class ByteParser
{
    private const MATCHING_PATTERN = '/^([\d.]*)(\D{0,2})$/';

    public function parseBytes(string $from): ?int
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        if (!preg_match(self::MATCHING_PATTERN, $from, $matches)) {
            return null;
        }

        [, $number, $suffix] = $matches;

        if (empty($number)) {
            return null;
        }

        $exponent = array_flip($units)[$suffix] ?? 0;

        if (null === $exponent) {
            return null;
        }

        return (int) ($number * (1024 ** $exponent));
    }
}
