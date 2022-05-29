<?php

declare(strict_types=1);

namespace Amneale\ByteForm;

class ByteFormatter
{
    public function formatBytes(int $bytes, int $decimals = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $exponent = $bytes > 0 ? floor(log($bytes, 1024)) : 0;

        return number_format($bytes / (1024 ** $exponent), $decimals) . $units[$exponent];
    }
}
