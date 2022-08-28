<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use App\DeckFactory;
use App\PlayerFactory;
use App\Game;
use App\TexasHoldEm;
use App\Player;
use App\Card;

class GenerateRandomHandsCommand
{
	private $NUMBER_OF_PLAYERS = 4;
	private $SHUFFLE_DECK = true;

	public function execute(): int
	{
		for ($z = 0; $z < 1000000; $z++) {

			$deck = DeckFactory::create($this->SHUFFLE_DECK);

			$game = new TexasHoldem();

			$players = PlayerFactory::create($this->NUMBER_OF_PLAYERS);

			$game->addPlayers($players);

			for ($i = 0; $i < TexasHoldem::CARDS_PER_PLAYER; $i++) {
				foreach ($players as $player) {
					$card = $deck->pluck();
					$player->addCard($card);
				}
			}

			$results = $game->calculateScoring();

		}
		
		return $i;
	}
}

$command = new GenerateRandomHandsCommand();
return $command->execute();
