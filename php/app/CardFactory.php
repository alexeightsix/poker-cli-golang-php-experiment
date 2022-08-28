<?php
declare(strict_types=1);

namespace App;

use App\Card;

class CardFactory
{
	public static function create(array $rows = []): array
	{
		foreach ($rows as $row) {
			$card = new Card();
			$card->setSuit($row[0]);
			$card->setRank($row[1]);
			$cards[] = $card;
		}
		
		return $cards;
	}
}
