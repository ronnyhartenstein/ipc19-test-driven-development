<?php declare(strict_types=1);


namespace TDDWorkshop\Test;


use PHPUnit\Framework\TestCase;
use TDDWorkshop\TicTacToe\Board;

class BoardTest extends TestCase
{
    public function test_board_is_3_x_3(): void
    {
        $board = new Board();
        $this->assertSame(3, $board->cols());
        $this->assertSame(3, $board->rows());
    }

}