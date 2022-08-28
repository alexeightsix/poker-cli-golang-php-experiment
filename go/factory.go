package main

import(
	"strconv"
)

func generatePlayers(number_of_players int) Players {
	var players Players

	for i := 0; i < number_of_players; i++ {

		var player = Player{
			name:  "Player " + strconv.Itoa(i),
			id:    i,
			cards: Cards{},
		}

		players = append(players, player)

	}

	return players
}
