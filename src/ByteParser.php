<?php

declare(strict_types=1);

namespace Amneale\ByteForm;

class ByteParser
{
    public function parseBytes(string $from): ?int
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $number = substr($from, 0, -2);
        $suffix = strtoupper(substr($from, -2));

        if (is_numeric($suffix[0])) { // B, or no suffix
            return (int) preg_replace('/\D/', '', $from);
        }

        $exponent = array_flip($units)[$suffix] ?? null;

        if (null === $exponent) {
            return null;
        }

        return (int) $number * (1024 ** $exponent);
    }
}
