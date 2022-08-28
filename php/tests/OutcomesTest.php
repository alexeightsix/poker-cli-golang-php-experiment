<?php

declare(strict_types=1);

use \App\Card;
use \App\CardFactory;
use \App\TexasHoldEm;
use App\PlayerFactory;
use PHPUnit\Framework\TestCase;

final class OutcomesTest extends TestCase
{
	protected function setUp(): void
	{
		$this->game = new TexasHoldEm();
		$this->player = PlayerFactory::create(1);
	}

	protected function tearDown(): void
	{
		unset($this->game, $this->player);
	}

	public function test_hand_contains_royal_flush(): void
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::NUM_10
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_JACK
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_QUEEN
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_KING
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_ACE
			]
		]);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_ROYAL_FLUSH === $hand);
	}

	public function test_hand_contains_straight_flush()
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::NUM_2
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_3
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_4
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_5
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_6
			]
		]);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_STRAIGHT_FLUSH === $hand);
	}

	public function test_hand_contains_four_of_a_kind()
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::NUM_2
			],
			[
				Card::SUIT_DIAMONDS,
				Card::NUM_2
			],
			[
				Card::SUIT_HEARTS,
				Card::NUM_2
			],
			[
				Card::SUIT_SPADES,
				Card::NUM_2
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_ACE
			]
		]);

		$player = PlayerFactory::create(1);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_FOUR_OF_A_KIND === $hand);
	}

	public function test_hand_contains_full_house()
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::FACE_KING
			],
			[
				Card::SUIT_DIAMONDS,
				Card::FACE_KING
			],
			[
				Card::SUIT_HEARTS,
				Card::FACE_KING
			],
			[
				Card::SUIT_SPADES,
				Card::NUM_3
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_3
			]
		]);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_FULL_HOUSE === $hand);
	}

	public function test_hand_contains_flush()
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::NUM_10
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_3
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_2
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_3
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_ACE
			]
		]);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_FLUSH === $hand);
	}

	public function test_hand_contains_straight()
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::NUM_2
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_3
			],
			[
				Card::SUIT_HEARTS,
				Card::NUM_4
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_5
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_ACE
			]
		]);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_STRAIGHT === $hand);
	}

	public function test_hand_contains_three_of_a_kind()
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::NUM_2
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_2
			],
			[
				Card::SUIT_HEARTS,
				Card::NUM_2
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_5
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_ACE
			]
		]);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_THREE_OF_A_KIND === $hand);
	}

	public function test_hand_contains_two_pairs()
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::NUM_2
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_2
			],
			[
				Card::SUIT_HEARTS,
				Card::FACE_ACE
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_ACE
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_JACK
			]
		]);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_TWO_PAIRS === $hand);
	}

	public function test_hand_contains_pair()
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::NUM_6
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_2
			],
			[
				Card::SUIT_HEARTS,
				Card::NUM_4
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_ACE
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_ACE
			]
		]);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_PAIR === $hand);
	}

	public function test_hand_contains_high_card()
	{
		$cards = CardFactory::create([
			[
				Card::SUIT_CLUBS,
				Card::NUM_6
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_7
			],
			[
				Card::SUIT_HEARTS,
				Card::NUM_8
			],
			[
				Card::SUIT_CLUBS,
				Card::NUM_9
			],
			[
				Card::SUIT_CLUBS,
				Card::FACE_ACE
			]
		]);

		$this->player->addCards($cards);

		$cards = $this->player->getCards();

		$hand = $this->game->calculateHand($cards);

		$this->assertTrue(TexasHoldEm::HAND_HIGHCARD === $hand);
	}
}