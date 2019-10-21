<?php declare(strict_types=1);


namespace TDDWorkshop\Test;


use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function test_meep(): void
    {
        $this->assertSame(5, 10 / 2);
    }
}