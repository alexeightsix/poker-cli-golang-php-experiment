<?php
declare(strict_types=1);

namespace App;

abstract class AbstractPokerGame {

	public $players;

	public function addPlayers(array $players)
	{
		$this->players = $players;
	}

	public function isSameSuit(array $cards): bool
	{
		$last = null;

		foreach ($cards as $card) {
			if ($last == null) {
				$last = $card->suit;
				continue;
			}

			if ($last != $card->suit)
				return false;
		}

		return true;
	}
}