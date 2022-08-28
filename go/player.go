package main

type Players []Player

type Player struct {
	id    int
	name  string
	cards []Card
	score HAND_SCORING
}

func (player *Player) addCards(cards Cards) {
	player.cards = append(player.cards, cards...)
}

func (player Player) scoreCard() string {
	str := ""

	for i := 0; i < len(player.cards); i++ {
		str = str + " " + player.cards[i].utf8 + " "
	}

	return str
}
