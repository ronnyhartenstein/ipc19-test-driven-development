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

    /** @var ?string  */
    private $winner = null;

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
        $this->checkIfWon();
    }

    public function placePlayerO(int $row, int $col): void
    {
        $field = $this->get($row, $col);
        if ($this->played_field && $this->played_field->isPlayerO()) {
            throw new PlayerPlacesBeforeException();
        }
        $field->setPlayerO();
        $this->played_field = $field;
        $this->checkIfWon();
    }

    public function get(int $row, int $col): Field
    {
        /** @var Field $field */
        $field = $this->fields[$row][$col];
        return $field;
    }

    public function gameHasWon(): bool
    {
        return $this->winner !== null;
    }

    public function winner(): ?string
    {
        return $this->winner;
    }

    private function checkIfWon(): void
    {
        if (!$this->gameHasWon()) {
            $this->checkIfWonByRow();
        }
        if (!$this->gameHasWon()) {
            $this->checkIfWonByCol();
        }
        if (!$this->gameHasWon()) {
            $this->checkDiagonals();
        }
    }

    private function checkIfWonByRow():  void
    {
        for ($row = 1; $row <= self::ROWS; $row++) {
            /** @var ?string $player */
            $player = null;
            for ($col = 1; $col <= self::COLS; $col++) {
                /** @var Field $field */
                $field = $this->fields[$row][$col];
                if ($field->getPlayer() === Field::EMPTY) {
                    break;
                }
                if ($player === null) {
                    $player = $field->getPlayer();
                    continue;
                }
                if ($field->getPlayer() !== $player) {
                    break;
                }
                if ($col === self::COLS) {
                    $this->winner = $player;
                    break;
                }
            }
            if ($this->winner) {
                break;
            }
        }
    }

    private function checkIfWonByCol():void
    {
        for ($col = 1; $col <= self::COLS; $col++) {
            /** @var ?string $player */
            $player = null;
            for ($row = 1; $row <= self::ROWS; $row++) {
                /** @var Field $field */
                $field = $this->fields[$row][$col];
                if ($field->getPlayer() === Field::EMPTY) {
                    break;
                }
                if ($player === null) {
                    $player = $field->getPlayer();
                    continue;
                }
                if ($field->getPlayer() !== $player) {
                    break;
                }
                if ($row === self::COLS) {
                    $this->winner = $player;
                    break;
                }
            }
            if ($this->winner) {
                break;
            }
        }
    }

    private function checkDiagonals(): void
    {
        $this->checkDiagonalsFromTopLeftToBottomRight();
        $this->checkDiagonalsFromBottomLeftToTopRight();
    }

    private function checkDiagonalsFromTopLeftToBottomRight(): void
    {
        /** @var ?string $player */
        $player = null;
        for ($rowcol = 1; $rowcol <= self::COLS; $rowcol++) {
            /** @var Field $field */
            $field = $this->fields[$rowcol][$rowcol];
            if ($field->getPlayer() === Field::EMPTY) {
                break;
            }
            if ($player === null) {
                $player = $field->getPlayer();
                continue;
            }
            if ($field->getPlayer() !== $player) {
                break;
            }
            if ($rowcol === self::COLS) {
                $this->winner = $player;
                break;
            }
        }
    }

    private function checkDiagonalsFromBottomLeftToTopRight(): void
    {
        /** @var ?string $player */
        $player = null;
        for ($row = 1; $row <= self::ROWS; $row++) {
            $col = self::COLS + 1 - $row;
            /** @var Field $field */
            $field = $this->fields[$row][$col];
            if ($field->getPlayer() === Field::EMPTY) {
                break;
            }
            if ($player === null) {
                $player = $field->getPlayer();
                continue;
            }
            if ($field->getPlayer() !== $player) {
                break;
            }
            if ($row === self::ROWS) {
                $this->winner = $player;
                break;
            }
        }
    }
}
