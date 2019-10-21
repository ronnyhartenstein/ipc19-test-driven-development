<?php declare(strict_types=1);


namespace TDDWorkshop\Test;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function provider()
    {
        return [
            [5, 10, 2],
            [3, 12, 4],
//            [3.33, 9, 3]
        ];
    }

    /**
     * @dataProvider provider
     * @testdox $divident ÷~ $divisor = $ergebnis
     */
    public function test_ergebnis_a_durch_b_ist_c($ergebnis, $divident, $divisor): void
    {
        $this->assertSame($ergebnis, $divident / $divisor);
    }
}
