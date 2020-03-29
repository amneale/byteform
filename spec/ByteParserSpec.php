<?php

namespace spec\Amneale\ByteForm;

use PhpSpec\ObjectBehavior;

class ByteParserSpec extends ObjectBehavior
{
    public function it_parses_a_byte_amount(): void
    {
        $this->parseBytes('1B')->shouldReturn(1);
    }

    public function it_parses_a_kilobyte_amount(): void
    {
        $this->parseBytes('1.00KB')->shouldReturn(1024);
    }

    public function it_parses_a_megabyte_amount(): void
    {
        $this->parseBytes('1.00MB')->shouldReturn(1024 * 1024);
    }

    public function it_parses_a_gigabyte_amount(): void
    {
        $this->parseBytes('1.00GB')->shouldReturn(1024 * 1024 * 1024);
    }

    public function it_parses_a_terabyte_amount(): void
    {
        $this->parseBytes('1.00TB')->shouldReturn(1024 * 1024 * 1024 * 1024);
    }
}
