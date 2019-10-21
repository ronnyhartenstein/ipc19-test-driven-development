<?php declare(strict_types=1);

namespace TDDWorkshop\TicTacToe;


class Field
{
    const EMPTY = 1;
    const PLAYER_X = 2;
    const PLAYER_Y = 3;
    private $status = self::EMPTY;

    public function isEmpty(): bool {
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
    public function setPlayerY():void
    {
        if ($this->status !== self::EMPTY) {
            throw new FieldIsFilledException();
        }
        $this->status = self::PLAYER_Y;
    }
    public function isPlayerX():bool
    {
        return $this->status === self::PLAYER_X;
    }
    public function isPlayerY():bool
    {
        return $this->status === self::PLAYER_Y;
    }
}