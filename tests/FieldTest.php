<?php declare(strict_types=1);


namespace TDDWorkshop\Test;

use PHPUnit\Framework\TestCase;
use TDDWorkshop\TicTacToe\Field;
use TDDWorkshop\TicTacToe\FieldIsFilledException;

class FieldTest extends TestCase
{
    public function test_is_initial_empty(): void
    {
        $field = new Field();
        $this->assertTrue($field->isEmpty());
    }

    public function test_set_player_x_on_empty_field(): void
    {
        $field = new Field();
        $field->setPlayerX();
        $this->assertFalse($field->isEmpty());
        $this->assertTrue($field->isPlayerX());
        $this->assertFalse($field->isPlayerO());
    }

    public function test_set_player_o_on_empty_field(): void
    {
        $field = new Field();
        $field->setPlayerO();
        $this->assertFalse($field->isEmpty());
        $this->assertFalse($field->isPlayerX());
        $this->assertTrue($field->isPlayerO());
    }

    public function test_set_player_o_on_filled_field_with_player_x(): void
    {
        $field = new Field();
        $field->setPlayerX();
        $this->expectException(FieldIsFilledException::class);
        $field->setPlayerO();
    }

    public function test_set_player_x_on_filled_field_with_player_y(): void
    {
        $field = new Field();
        $field->setPlayerO();
        $this->expectException(FieldIsFilledException::class);
        $field->setPlayerX();
    }

    public function test_set_player_x_on_filled_field_with_player_x(): void
    {
        $field = new Field();
        $field->setPlayerX();
        $this->expectException(FieldIsFilledException::class);
        $field->setPlayerX();
    }

    public function test_set_player_o_on_filled_field_with_player_y(): void
    {
        $field = new Field();
        $field->setPlayerO();
        $this->expectException(FieldIsFilledException::class);
        $field->setPlayerO();
    }
}
