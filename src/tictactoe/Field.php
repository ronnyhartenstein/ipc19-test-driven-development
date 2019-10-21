<?php declare(strict_types=1);

namespace TDDWorkshop\TicTacToe;

class Field
{
    private const EMPTY = ' ';
    public const PLAYER_X = 'X';
    public const PLAYER_O = 'O';

    /** @var string */
    private $status = self::EMPTY;

    public function isEmpty(): bool
    {
        return $this->status === self::EMPTY;
    }

    /**
     * @throws FieldIsFilledException
     */
    public function setPlayerX():void
    {
        if ($this->status !== self::EMPTY) {
            throw new FieldIsFilledException();
        }
        $this->status = self::PLAYER_X;
    }

    /**
     * @throws FieldIsFilledException
     */
    public function setPlayerO():void
    {
        if ($this->status !== self::EMPTY) {
            throw new FieldIsFilledException();
        }
        $this->status = self::PLAYER_O;
    }
    public function isPlayerX():bool
    {
        return $this->status === self::PLAYER_X;
    }
    public function isPlayerO():bool
    {
        return $this->status === self::PLAYER_O;
    }
    public function getPlayer(): string
    {
        return $this->status;
    }
}
