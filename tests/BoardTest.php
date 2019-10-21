<?php declare(strict_types=1);


namespace TDDWorkshop\Test;

use PHPUnit\Framework\TestCase;
use TDDWorkshop\TicTacToe\Board;
use TDDWorkshop\TicTacToe\Field;
use TDDWorkshop\TicTacToe\PlayerPlacesBeforeException;

class BoardTest extends TestCase
{
    public function test_board_is_3_x_3(): void
    {
        $board = new Board();
        $this->assertSame(3, $board->cols());
        $this->assertSame(3, $board->rows());
    }

    public function test_start_with_player_x_top_left(): void
    {
        $board = new Board();
        $board->placePlayerX(1, 1);
        $this->assertTrue($board->get(1, 1)->isPlayerX());
    }

    public function test_start_with_player_o_top_left(): void
    {
        $board = new Board();
        $board->placePlayerO(1, 1);
        $this->assertTrue($board->get(1, 1)->isPlayerO());
    }

    public function test_players_turn_one_by_one(): void
    {
        $board = new Board();
        $board->placePlayerO(1, 1);
        $board->placePlayerX(1, 2);
        $board->placePlayerO(1, 3);
        $this->assertTrue(true);
    }


    public function test_player_x_places_again(): void
    {
        $board = new Board();
        $board->placePlayerX(1, 1);
        $this->expectException(PlayerPlacesBeforeException::class);
        $board->placePlayerX(1, 2);
    }

    public function test_player_o_places_again(): void
    {
        $board = new Board();
        $board->placePlayerO(1, 1);
        $this->expectException(PlayerPlacesBeforeException::class);
        $board->placePlayerO(1, 2);
    }

    public function test_win_game_with_a_col(): void
    {
        $board = new Board();
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(1, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerX(1, 2);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(2, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerX(1, 3);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(3, 1);
        $this->assertTrue($board->gameHasWon());
        $this->assertSame(Field::PLAYER_O, $board->winner());
    }

    public function test_win_game_with_a_row(): void
    {
        $board = new Board();
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(1, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerX(2, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(1, 2);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerX(3, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(1, 3);
        $this->assertTrue($board->gameHasWon());
        $this->assertSame(Field::PLAYER_O, $board->winner());
    }


    public function test_win_game_with_a_diagonal_top_left_to_bottom_right(): void
    {
        $board = new Board();
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(1, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerX(2, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(2, 2);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerX(3, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(3, 3);
        $this->assertTrue($board->gameHasWon());
        $this->assertSame(Field::PLAYER_O, $board->winner());
    }

    public function test_win_game_with_a_diagonal_bottom_left_to_top_right(): void
    {
        $board = new Board();
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(3, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerX(2, 1);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(2, 2);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerX(3, 2);
        $this->assertFalse($board->gameHasWon());
        $board->placePlayerO(1, 3);
        $this->assertTrue($board->gameHasWon());
        $this->assertSame(Field::PLAYER_O, $board->winner());
    }
}
