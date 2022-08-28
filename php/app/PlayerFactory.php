<?php

declare(strict_types=1);

namespace App;

use App\Player;

class PlayerFactory
{
	public static function create(int $count = 1)
	{
		$faker = \Faker\Factory::create();

		for ($i = 0; $i < $count; $i++) {
			$players[] = new Player($faker->name);
		}

		if ($count == 1)
			return $players[0];

		return $players;
	}
}
