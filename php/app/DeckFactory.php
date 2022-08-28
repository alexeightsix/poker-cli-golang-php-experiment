<?php

declare(strict_types=1);

namespace App;

use App\Card;
use App\Deck;

class DeckFactory
{
	public static function create(bool $shuffle = true)
	{
		$cards = [
			[
				"code" => "\u{1F0A1}",
				"label" => "Ace of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::FACE_ACE,
			],
			[
				"code" => "\u{1F0A2}",
				"label" => "Two of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::NUM_2,
			],
			[
				"code" => "\u{1F0A3}",
				"label" => "Three of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::NUM_3,
			],
			[
				"code" => "\u{1F0A4}",
				"label" => "Four of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::NUM_4,
			],
			[
				"code" => "\u{1F0A5}",
				"label" => "Five of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::NUM_5,
			],
			[
				"code" => "\u{1F0A6}",
				"label" => "Six of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::NUM_6,
			],
			[
				"code" => "\u{1F0A7}",
				"label" => "Seven of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::NUM_7,
			],
			[
				"code" => "\u{1F0A8}",
				"label" => "Eight of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::NUM_8,
			],
			[
				"code" => "\u{1F0A9}",
				"label" => "Nine of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::NUM_9,
			],
			[
				"code" => "\u{1F0AA}",
				"label" => "Ten of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::NUM_10,
			],
			[
				"code" => "\u{1F0AB}",
				"label" => "Jack of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::FACE_JACK,
			],
			[
				"code" => "\u{1F0AD}",
				"label" => "Queen of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => 1,
			],
			[
				"code" => "\u{1F0AE}",
				"label" => "King of Spades",
				"suit" => Card::SUIT_SPADES,
				"rank" => Card::FACE_KING,
			],
			[
				"code" => "\u{1F0B1}",
				"label" => "Ace of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::FACE_ACE,
			],
			[
				"code" => "\u{1F0B2}",
				"label" => "Two of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::NUM_2
			],
			[
				"code" => "\u{1F0B3}",
				"label" => "Three of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => 1,
			],
			[
				"code" => "\u{1F0B4}",
				"label" => "Four of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => 1,
			],
			[
				"code" => "\u{1F0B5}",
				"label" => "Five of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::NUM_5,
			],
			[
				"code" => "\u{1F0B6}",
				"label" => "Six of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::NUM_6,
			],
			[
				"code" => "\u{1F0B7}",
				"label" => "Seven of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::NUM_7,
			],
			[
				"code" => "\u{1F0B8}",
				"label" => "Eight of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::NUM_8,
			],
			[
				"code" => "\u{1F0B9}",
				"label" => "Nine of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::NUM_9,
			],
			[
				"code" => "\u{1F0BA}",
				"label" => "Ten of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::NUM_10,
			],
			[
				"code" => "\u{1F0BB}",
				"label" => "Jack of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::FACE_JACK,
			],
			[
				"code" => "\u{1F0BD}",
				"label" => "Queen of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::FACE_QUEEN,
			],
			[
				"code" => "\u{1F0BE}",
				"label" => "King of Hearts",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::FACE_KING,
			],
			[
				"code" => "\u{1F0C1}",
				"label" => "Ace of Diamonds",
				"suit" => Card::SUIT_HEARTS,
				"rank" => Card::FACE_ACE,
			],
			[
				"code" => "\u{1F0C2}",
				"label" => "Two of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::NUM_2,
			],
			[
				"code" => "\u{1F0C3}",
				"label" => "Three of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::NUM_3,
			],
			[
				"code" => "\u{1F0C4}",
				"label" => "Four of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::NUM_4,
			],
			[
				"code" => "\u{1F0C5}",
				"label" => "Five of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::NUM_5,
			],
			[
				"code" => "\u{1F0C6}",
				"label" => "Six of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::NUM_6,
			],
			[
				"code" => "\u{1F0C7}",
				"label" => "Seven of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::NUM_7,
			],
			[
				"code" => "\u{1F0C8}",
				"label" => "Eight of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::NUM_8,
			],
			[
				"code" => "\u{1F0C9}",
				"label" => "Nine of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::NUM_9,
			],
			[
				"code" => "\u{1F0CA}",
				"label" => "Ten of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::NUM_10,
			],
			[
				"code" => "\u{1F0CB}",
				"label" => "Jack of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::FACE_JACK,
			],
			[
				"code" => "\u{1F0CD}",
				"label" => "Queen of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::FACE_QUEEN,
			],
			[
				"code" => "\u{1F0CE}",
				"label" => "King of Diamonds",
				"suit" => Card::SUIT_DIAMONDS,
				"rank" => Card::FACE_KING,
			],
			[
				"code" => "\u{1F0D1}",
				"label" => "Ace of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::FACE_ACE,
			],
			[
				"code" => "\u{1F0D2}",
				"label" => "Two of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::NUM_2,
			],
			[
				"code" => "\u{1F0D3}",
				"label" => "Three of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::NUM_3,
			],
			[
				"code" => "\u{1F0D4}",
				"label" => "Four of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::NUM_4,
			],
			[
				"code" => "\u{1F0D5}",
				"label" => "Five of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::NUM_5,
			],
			[
				"code" => "\u{1F0D6}",
				"label" => "Six of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::NUM_6,
			],
			[
				"code" => "\u{1F0D7}",
				"label" => "Seven of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::NUM_7,
			],
			[
				"code" => "\u{1F0D8}",
				"label" => "Eight of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::NUM_8,
			],
			[
				"code" => "\u{1F0D9}",
				"label" => "Nine of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::NUM_9,
			],
			[
				"code" => "\u{1F0DA}",
				"label" => "Ten of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::NUM_10
			],
			[
				"code" => "\u{1F0DB}",
				"label" => "Jack of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::FACE_JACK,
			],
			[
				"code" => "\u{1F0DD}",
				"label" => "Queen of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::FACE_QUEEN,
			],
			[
				"code" => "\u{1F0DE}",
				"label" => "King of Clubs",
				"suit" => Card::SUIT_CLUBS,
				"rank" => Card::FACE_KING,
			]
		];

		$deck = new Deck();

		foreach ($cards as $tmpCard) {
			$card = new Card();
			$card->setSuit($tmpCard['suit']);
			$card->setRank($tmpCard['rank']);
			$card->setCode($tmpCard['code']);
			$card->setLabel($tmpCard['label']);
			$deck->addCard($card);
		}

		$deck->shuffle();

		return $deck;
	}
}
