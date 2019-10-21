<?php declare(strict_types=1);


namespace TDDWorkshop\TicTacToe;

class Board
{
    private const ROWS = 3;
    private const COLS = 3;

    /** @var Field[][] */
    private $fields = [];

    /** @var ?Field  */
    private $played_field = null;

    public function __construct()
    {
        for ($col = 1; $col <= self::COLS; $col++) {
            for ($row = 1; $row <= self::ROWS; $row++) {
                $this->fields[$row][$col] = new Field();
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
    public function placePlayerX(int $row, int $col): void
    {
        $field = $this->get($row, $col);
        if ($this->played_field && $this->played_field->isPlayerX()) {
            throw new PlayerPlacesBeforeException();
        }
        $field->setPlayerX();
        $this->played_field = $field;
    }

    public function placePlayerO(int $row, int $col): void
    {
        $field = $this->get($row, $col);
        if ($this->played_field && $this->played_field->isPlayerO()) {
            throw new PlayerPlacesBeforeException();
        }
        $field->setPlayerO();
        $this->played_field = $field;
    }

    public function get(int $row, int $col): Field
    {
        /** @var Field $field */
        $field = $this->fields[$row][$col];
        return $field;
    }
}
