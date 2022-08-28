<?php

declare(strict_types=1);

namespace App;

class TexasHoldEm extends AbstractPokerGame
{
	public const HAND_ROYAL_FLUSH 		= 100;
	public const HAND_STRAIGHT_FLUSH 	= 90;
	public const HAND_FOUR_OF_A_KIND 	= 80;
	public const HAND_FULL_HOUSE 		= 70;
	public const HAND_FLUSH 			= 60;
	public const HAND_STRAIGHT 			= 50;
	public const HAND_THREE_OF_A_KIND 	= 40;
	public const HAND_TWO_PAIRS 		= 30;
	public const HAND_PAIR 				= 20;
	public const HAND_HIGHCARD 			= 10;

	public const CARDS_PER_PLAYER 		= 5;

	public function isRoyalFlush(array $cards): bool
	{
		if (!$this->isSameSuit($cards))
			return false;

		$royalFlush = [
			Card::NUM_10,
			Card::FACE_JACK,
			Card::FACE_QUEEN,
			Card::FACE_KING,
			Card::FACE_ACE
		];

		$hand = [
			$cards[1]->rank,
			$cards[2]->rank,
			$cards[3]->rank,
			$cards[4]->rank,
			$cards[0]->rank
		];

		return $royalFlush === $hand;
	}

	public function isStraightFlush(array $cards): bool
	{
		if (!$this->isSameSuit($cards)) {
			return false;
		}

		for ($i = 0; $i + 1 < count($cards); $i++) {
			$res = $cards[$i + 1]->rank - $cards[$i]->rank;
			if ($res != 1)
				return false;
		}

		return true;
	}

	public function isFourOfAKind(array $cards)
	{
		foreach ($cards as $card) {
			$ranks[] = $card->rank;
		}

		$count = array_count_values($ranks);
		$count = array_flip($count);

		if (empty($count[4]))
			return false;

		return true;
	}

	public function isFullHouse(array $cards)
	{
		foreach ($cards as $card) {
			$ranks[] = $card->rank;
		}

		$count = array_count_values($ranks);
		$count = array_flip($count);

		if (count($count) !== 2)
			return false;

		if (empty($count[2]))
			return false;

		if (empty($count[3]))
			return false;

		return true;
	}

	public function isFlush(array $cards)
	{
		return $this->isSameSuit($cards);
	}

	public function isStraight(array $cards)
	{
		for ($i = 0; $i + 1 < count($cards); $i++) {
			$res = $cards[$i + 1]->rank - $cards[$i]->rank;
			if ($res != 1) {
				return false;
			}
		}

		return true;
	}

	public function isThreeOfAKind(array $cards)
	{
		foreach ($cards as $card) {
			$ranks[] = $card->rank;
		}

		$count = array_count_values($ranks);
		$count = array_flip($count);

		if (empty($count[3]))
			return false;

		return true;
	}

	public function isTwoPairs(array $cards)
	{
		foreach ($cards as $card) {
			$ranks[] = $card->rank;
		}

		$counts = array_count_values($ranks);
		$pairs = 0;

		foreach ($counts as $rank => $count) {
			if ($count == 2) {
				$pairs++;
			}
		}

		return ($pairs == 2);
	}

	public function isPair(array $cards)
	{
		foreach ($cards as $card) {
			$ranks[] = $card->rank;
		}

		$count = array_count_values($ranks);
		$count = array_flip($count);

		if (empty($count[2]))
			return false;

		return true;
	}

	public function calculateHand(array $cards): int
	{
		if ($this->isRoyalFlush($cards)) {
			return self::HAND_ROYAL_FLUSH;
		}

		if ($this->isStraightFlush($cards)) {
			return self::HAND_STRAIGHT_FLUSH;
		}

		if ($this->isFourOfAKind($cards)) {
			return self::HAND_FOUR_OF_A_KIND;
		}

		if ($this->isFullHouse($cards)) {
			return self::HAND_FULL_HOUSE;
		}

		if ($this->isFlush($cards)) {
			return self::HAND_FLUSH;
		}

		if ($this->isStraight($cards)) {
			return self::HAND_STRAIGHT;
		}

		if ($this->isThreeOfAKind($cards)) {
			return self::HAND_THREE_OF_A_KIND;
		}

		if ($this->isTwoPairs($cards)) {
			return self::HAND_TWO_PAIRS;
		}

		if ($this->isPair($cards)) {
			return self::HAND_PAIR;
		}

		return self::HAND_HIGHCARD;
	}

	public function calculateScoring()
	{
		foreach ($this->players as $player) {
			$cards = $player->getCards();
			$score = $this->calculateHand($cards);
			$player->setScore($score);
		}

		usort($this->players, function ($a, $b) {
			return $b->score - $a->score;
		});

		return $this->players;
	}
}
