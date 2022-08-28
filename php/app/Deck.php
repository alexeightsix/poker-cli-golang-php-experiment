<?php
declare(strict_types=1);

namespace App;

use App\Card;

class Deck
{
	public $cards;

	public function addCard(Card $card) 
	{
		$this->cards[] = $card;
	}

	public function shuffle() 
	{
		shuffle($this->cards);
	}

	public function pluck(): Card 
	{
		$count = count($this->cards);

		$randomNumber = rand(0, $count - 1);

		$tmpCard = $this->cards[$randomNumber];

		unset($this->cards[$randomNumber]);

		$this->cards = array_values($this->cards);

		return $tmpCard;
	}
}