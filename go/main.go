package main

func main() {

	const NUMBER_OF_PLAYERS = 1
	const CARDS_PER_PLAYER = 5
	const SHUFFLE_DICK = true
	const TOTAL_CARDS = NUMBER_OF_PLAYERS * CARDS_PER_PLAYER

	for i := 0; i < 1000000; i++ {

		var (
			game    Game
			deck    Deck    = GenerateDeck(true)
			players Players = generatePlayers(NUMBER_OF_PLAYERS)
		)

		game.addPlayers(players)

		for i := 0; i < CARDS_PER_PLAYER; i++ {
			for p := 0; p < len(players); p++ {
				card := deck.pluck()
				game.players[p].addCards(card)
			}
		}

		game.calculateScoring()

	}
}
