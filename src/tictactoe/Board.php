<?php declare(strict_types=1);


namespace TDDWorkshop\TicTacToe;


class Board
{
    private const ROWS = 3;
    private const COLS = 3;
    private $fields = [];

    public function __construct()
    {
        for ($x = 1; $x <= self::COLS; $x++) {
            for ($y = 1; $y <= self::ROWS; $y++) {
                $this->fields[$y][$x] = new Field();
            }
        }
    }

    public function rows(): int
    {
        return count($this->fields);
    }
    public function cols(): int
    {
        return count($this->fields[1]);
    }

    
}