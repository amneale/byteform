<?php

namespace spec\Amneale\ByteForm;

use PhpSpec\ObjectBehavior;

class ByteParserSpec extends ObjectBehavior
{
    public function it_parses_a_byte_amount(): void
    {
        $this->parseBytes('1B')->shouldReturn(1);
        $this->parseBytes('1')->shouldReturn(1);
        $this->parseBytes('1.5B')->shouldReturn(1);
    }

    public function it_parses_a_kilobyte_amount(): void
    {
        $this->parseBytes('1.00KB')->shouldReturn(1024);
        $this->parseBytes('1.5KB')->shouldReturn(1536);
    }

    public function it_parses_a_megabyte_amount(): void
    {
        $this->parseBytes('1.00MB')->shouldReturn(1048576);
        $this->parseBytes('1.5MB')->shouldReturn(1572864);
    }

    public function it_parses_a_gigabyte_amount(): void
    {
        $this->parseBytes('1.00GB')->shouldReturn(1073741824);
        $this->parseBytes('1.5GB')->shouldReturn(1610612736);
    }

    public function it_parses_a_terabyte_amount(): void
    {
        $this->parseBytes('1.00TB')->shouldReturn(1099511627776);
        $this->parseBytes('1.5TB')->shouldReturn(1649267441664);
    }

    public function it_does_not_parse_an_invalid_amount(): void
    {
        $this->parseBytes('foo')->shouldReturn(null);
        $this->parseBytes('1B2B3B')->shouldReturn(null);
    }

    public function it_parses_mixed_case_strings(): void
    {
        $this->parseBytes('1.00kb')->shouldReturn(1024);
    }

    public function it_parses_strings_containing_whitespace(): void
    {
        $this->parseBytes('1.00 kb')->shouldReturn(1024);
    }
}
