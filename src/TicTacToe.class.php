<?php
/*------------------------------------------------------------*/
define('YOU', 'X');
define('ME', 'O');
/*------------------------------------------------------------*/
class TicTacToe extends Mdemo {
	/*------------------------------------------------------------*/
	private $game;
	private $gameOver;
	private $ttl = 3600;
	/*------------------------------------------------------------*/
	/**
	 * the default action is to start a new game.
	 *
	 * (this method is called by Mcontroller if no action is
	 * specified in the url)
	 */
	public function index() {
		$this->newGame();
	}
	/*------------------------------------------------------------*/
	/**
	 * to start a new game
	 * empty or re-empty the game array
	 * by placing null content in all the cells
	 */
	public function newGame() {
		$this->game = array(
			array(null, null, null,),
			array(null, null, null,),
			array(null, null, null,),
		);
		$this->setGame();
		$this->show();
	}
	/*------------------------------------------------------------*/
	private function setGame() {
		$json = json_encode($this->game);
		$this->Mview->setCookie("ticTacToe", $json,  $this->ttl);
	}
	/*------------------------------------------------------------*/
	private function getGame() {
		$json = @$_COOKIE['ticTacToe'];
		$this->game = json_decode($json, true);
	}
	/*------------------------------------------------------------*/
	/*------------------------------------------------------------*/
	/**
	 * a player's move:
	 * place the player's chip in the requested spot
	 * and make the next move
	 */

	public function play() {
		$this->getGame();
		$x = $_REQUEST['x'];
		$y = $_REQUEST['y'];
		$this->game[$x][$y] = YOU;
		$this->next();
		$this->show();
	}
	/*------------------------------------------------------------*/
	/*------------------------------------------------------------*/
	/**
	 * show the board
	 * if the game is over then game buttons are deactivated
	 */
	private function show() {
		$this->Mview->showTpl("ticTacToe.tpl", array(
			'game' => $this->game,
			'active' => ! $this->gameOver,
		));
	}
	/*------------------------------------------------------------*/
	/**
	 * what to do next
	 * after the player played.
	 * check to see if the game is over.
	 * if it is, tell win/lose result and show
	 * the final board, with buttons deactivated.
	 * otherwise, make the move, and again check if the game is over.
	 */
	private function next() {
		if ( $this->isWinner(YOU)) {
			$this->Mview->msg("Congratz. You win. Wanna Play Again?");
			$this->gameOver = true;
			return;
		}
		if ( $this->isTie() ) {
			$this->Mview->msg("Tie. Wanna Play Again?");
			$this->gameOver = true;
			return;
		}

		$this->move();

		if ( $this->isWinner(ME)) {
			$this->Mview->msg(":-(  Wanna Play Again?");
			$this->gameOver = true;
			return;
		}

		$this->setGame();
	}
	/*------------------------------------------------------------*/
	/**
	 * is the given player ('ME' or 'YOU') a winner on the current state of the board
	 * check each of the rows, columns, and diagonals
	 */
	private function isWinner($who) {
		$m = $this->game;
		for($i=0;$i<3;$i++) {
			// rows
			if ( $this->trioWins($m[$i], $who) )
				return(true);
			// columns
			if ( $this->trioWins(Mutils::arrayColumn($m, $i), $who) )
				return(true);
		}
		// top-left to bottom-right
		if ( $this->trioWins(array($m[0][0], $m[1][1], $m[2][2],), $who) )
			return(true);
		// top-right to bottom-left
		if ( $this->trioWins(array($m[0][2], $m[1][1], $m[2][0],), $who) )
			return(true);
		return(false);
	}
	/*------------------------------------------------------------*/
	/**
	 * does this array of three values represent a winning for the given player
	 * it does if all three values equal the argument
	 */
	private function trioWins($trio, $who) {
		for($i=0;$i<3;$i++)
			if ( $trio[$i] != $who )
				return(false);
		return(true);
	}
	/*------------------------------------------------------------*/
	/**
	 * check if the board represents a tie.
	 * in fact, do not tell its a tie if there are still moves left
	 * (so they can be played anyway, even if to futility),
	 * and since this method is only called after winning combinations were checked,
	 * it boils down to merely checking to see that all places are filled with chips.
	 */
	private function isTie() {
		$m = $this->game;
		for($x=0;$x<3;$x++)
			for($y=0;$y<3;$y++)
				if ( $m[$x][$y] == null )
					return(false);
		return(true);
	}
	/*------------------------------------------------------------*/
	/**
	 * make a move
	 * this is the game strategy
	 * first try to see if a win is possible
	 * otherwise, block any potential win by the player
	 * otherwise, see if you can place a chip in the center
	 * otherwise, see if you can place a chip in a corner
	 * otherwise, see if you can place a chip on a side
	 * all the play functions return true if a chip was placed and false otherwise
	 */
	private function move() {
		$moveFuncs = array('win', 'block', 'center', 'corner', 'side');
		foreach ( $moveFuncs as $func )
			if ( $this->$func() )
				return;
	}
	/*------------------------------------------------------------*/
	/**
	 * try to win by completing a trio with the value ME
	 */
	private function win() {
		return($this->complete(ME));
	}
	/*------------------------------------------------------------*/
	/**
	 * try to block the player by completing the players trio
	 * in place of the player.
	 */
	private function block() {
		return($this->complete(YOU));
	}
	/*------------------------------------------------------------*/
	/**
	 * try to complete a trio that already has two chips of the same kind
	 * if the chips are 'ME', then this is a win attempt
	 * if the chips are 'YOU' then this is a block attempt
	 * since if there are two block cases, the game is lost anyway
	 * it is not important which is being blocked
	 * the method completeTrio() is called successively with all potential possibilties
	 * until a completion is found
	 * in which case the chip is placed in the designated place
	 * completeTrio is passed a trio in each case
	 * and the exact position is 'calculated' from the return value
	 */
	private function complete($who) {
		$m = $this->game;
		for($i=0;$i<3;$i++) {
			// rows
			if ( ($idx = $this->completeTrio($m[$i], $who)) >= 0 ) {
				$this->game[$i][$idx] = ME;
				return(true);
			}
			// columns
			if ( ($idx = $this->completeTrio(Mutils::arrayColumn($m, $i), $who)) >= 0 ) {
				$this->game[$idx][$i] = ME;
				return(true);
			}
		}
		// top-left to bottom-right
		if ( ($idx = $this->completeTrio(array($m[0][0], $m[1][1], $m[2][2],), $who)) >= 0 ) {
			$this->game[$idx][$idx] = ME;
			return(true);
		}
		// top-right to bottom-left
		if ( ($idx = $this->completeTrio(array($m[0][2], $m[1][1], $m[2][0],), $who)) >= 0 ) {
			$this->game[$idx][2-$idx] = ME;
			return(true);
		}
		return(false);
	}
	/*------------------------------------------------------------*/
	/**
	 * given an array of three values
	 * tell if it can be completed by placing a chip on the only vacant position.
	 * return the position (0-2) if so, or -1 if not
	 */
	private function completeTrio($trio, $who) {
		$numComplete = 0;
		$ret = null;
		for($i=0;$i<3;$i++) {
			if ( $trio[$i] != null && $trio[$i] != $who )
				return(-1);
			if ( $trio[$i] == $who )
				$numComplete++;
			else
				$ret = $i;
		}
		if ( $numComplete == 2 )
			return($ret);
		return(-1);
	}
	/*------------------------------------------------------------*/
	/**
	 * try to place a chip in the center of the baord
	 */
	private function center() {
		return($this->place(1, 1));
	}
	/*------------------------------------------------------------*/
	/**
	 * try to place a chip in the given position
	 */
	private function place($x, $y) {
		if ( $this->game[$x][$y] != null )
			return(false);
		$this->game[$x][$y] = ME ;
		return(true);
	}
	/*------------------------------------------------------------*/
	/**
	 * try to place a chip in any corner
	 * randomize so that the move is a bit less predictable
	 */
	private function corner() {
		$corners = array(
			array(0,0),
			array(0,2),
			array(2,0),
			array(2,2),
		);
		return($this->placeAtRandom($corners));
	}
	/*------------------------------------------------------------*/
	/**
	 * place in any of the given list of places at random
	 */
	private function placeAtRandom($places) {
		shuffle($places);
		foreach ( $places as $place )
			if ( $this->place($place[0], $place[1]) )
				return(true);
		return(false);
	}
	/*------------------------------------------------------------*/
	/**
	 * try to place a chip in any of the sides
	 */
	private function side() {
		$sides = array(
			array(0,1),
			array(1,0),
			array(1,2),
			array(2,1),
		);
		return($this->placeAtRandom($sides));
	}
	/*------------------------------------------------------------*/
}
/*------------------------------------------------------------*/
