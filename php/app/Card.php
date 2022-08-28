<?php
declare(strict_types=1);

namespace App;

class Card
{
	public const SUIT_CLUBS = 1;
	public const SUIT_DIAMONDS = 2;
	public const SUIT_HEARTS = 3;
	public const SUIT_SPADES = 4;

	public const NUM_2 = 2;
	public const NUM_3 = 3;
	public const NUM_4 = 4;
	public const NUM_5 = 5;
	public const NUM_6 = 6;
	public const NUM_7 = 7;
	public const NUM_8 = 8;
	public const NUM_9 = 9;
	public const NUM_10 = 10;

	public const FACE_ACE = 1;
	public const FACE_JACK = 11;
	public const FACE_QUEEN = 12;
	public const FACE_KING = 13;

	private $suit;
	private $rank;
	private $code;
	private $label;

	public function __get($property)
	{
		if (property_exists($this, $property))
			return $this->$property;
	}

	public function setSuit(int $suit): void
	{
		$this->suit = $suit;
	}

	public function setRank(int $rank): void
	{
		$this->rank = $rank;
	}

	public function setCode(string $code): void
	{
		$this->code = $code;
	}

	public function setLabel(string $label): void
	{
		$this->label = $label;
	}
}
