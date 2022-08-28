<?php

declare(strict_types=1);

namespace App;

class Player
{
	private string $id;
	private array $cards;
	private int $scoring;
	private string $name;

	public function __construct(string $name)
	{
		$this->id = uniqid("p_");
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getHand(): string
	{
		if ($this->score == TexasHoldEm::HAND_ROYAL_FLUSH) {
			return "HAND_ROYAL_FLUSH";
		}

		if ($this->score == TexasHoldEm::HAND_STRAIGHT_FLUSH) {
			return "HAND_STRAIGHT_FLUSH";
		}

		if ($this->score == TexasHoldEm::HAND_FOUR_OF_A_KIND) {
			return "HAND_FOUR_OF_A_KIND";
		}

		if ($this->score == TexasHoldEm::HAND_FULL_HOUSE) {
			return "HAND_FULL_HOUSE";
		}

		if ($this->score == TexasHoldEm::HAND_FLUSH) {
			return "HAND_FLUSH";
		}

		if ($this->score == TexasHoldEm::HAND_STRAIGHT) {
			return "HAND_STRAIGHT";
		}

		if ($this->score == TexasHoldEm::HAND_THREE_OF_A_KIND) {
			return "HAND_THREE_OF_A_KIND";
		}

		if ($this->score == TexasHoldEm::HAND_TWO_PAIRS) {
			return "HAND_TWO_PAIRS";
		}

		if ($this->score == TexasHoldEm::HAND_PAIR) {
			return "HAND_PAIR";
		}

		if ($this->score == TexasHoldEm::HAND_HIGHCARD) {
			return "HAND_HIGHCARD";
		}
	}

	public function addCards(array $cards): void
	{
		foreach ($cards as $card)
			$this->addCard($card);
	}

	public function addCard(Card $card): void
	{
		$this->cards[] = $card;
		$this->sortCards();
	}

	public function sortCards()
	{
		usort($this->cards, function ($a, $b) {
			return $a->rank - $b->rank;
		});
	}

	public function getCards()
	{
		return $this->cards;
	}

	public function setScore(int $score)
	{
		$this->score = $score;
	}

	public function setHand(int $hand)
	{
		$this->hand = $hand;
	}

	public function getScoreCard(): string
	{
		$output = PHP_EOL;
		$output .= $this->getName() . " | Points: " . $this->score . " | Hand: " . $this->getHand();

		$output .= PHP_EOL;

		foreach ($this->cards as $card) {
			$output .= $card->code . ' ';
		}

		$output .= PHP_EOL;

		return $output;
	}
}
