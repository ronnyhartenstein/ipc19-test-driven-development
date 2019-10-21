<?php declare(strict_types=1);


namespace TDDWorkshop\Test;


use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function test_ergebnis_10_durch_2_ist_5(): void
    {
        $this->assertSame(5, 10 / 2);
    }

    public function test_10_durch_3_ist_3_und_nochwas(): void
    {
        $this->assertSame(3.3333333333333335, 10 / 3);
    }
}