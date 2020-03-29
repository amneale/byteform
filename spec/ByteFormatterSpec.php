<?php

namespace spec\Amneale\ByteForm;

use PhpSpec\ObjectBehavior;

class ByteFormatterSpec extends ObjectBehavior
{
    public function it_formats_a_byte_amount(): void
    {
        $this->formatBytes(1)->shouldReturn('1.00B');
    }

    public function it_formats_a_kilobyte_amount(): void
    {
        $this->formatBytes(1024)->shouldReturn('1.00KB');
    }

    public function it_formats_a_megabyte_amount(): void
    {
        $this->formatBytes(1024 * 1024)->shouldReturn('1.00MB');
    }

    public function it_formats_a_gigabyte_amount(): void
    {
        $this->formatBytes(1024 * 1024 * 1024)->shouldReturn('1.00GB');
    }

    public function it_formats_a_terrabyte_amount(): void
    {
        $this->formatBytes(1024 * 1024 * 1024 * 1024)->shouldReturn('1.00TB');
    }
}
