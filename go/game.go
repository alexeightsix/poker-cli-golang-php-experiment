package main

import (
	"sort"
)

type Game struct {
	players []Player
}

type HAND_SCORING uint8

const (
	HAND_ROYAL_FLUSH     HAND_SCORING = 100
	HAND_STRAIGHT_FLUSH  HAND_SCORING = 90
	HAND_FOUR_OF_A_KIND  HAND_SCORING = 80
	HAND_FULL_HOUSE      HAND_SCORING = 70
	HAND_FLUSH           HAND_SCORING = 60
	HAND_STRAIGHT        HAND_SCORING = 50
	HAND_THREE_OF_A_KIND HAND_SCORING = 40
	HAND_TWO_PAIRS       HAND_SCORING = 30
	HAND_PAIR            HAND_SCORING = 20
	HAND_HIGHCARD        HAND_SCORING = 10
)

func (game *Game) addPlayers(players Players) {
	game.players = append(game.players, players...)
}

func isSameSuit(cards Cards) bool {
	last := cards[0].suit

	for i := 1; i < len(cards); i++ {
		if last != cards[i].suit {
			return false
		}
	}
	return true
}

func isRoyalFlush(cards Cards) bool {
	if !isSameSuit(cards) {
		return false
	}

	cards.sortByRank()

	royal_flush := []CARD_RANK{CARD_RANK_10, CARD_RANK_JACK, CARD_RANK_QUEEN, CARD_RANK_KING, CARD_RANK_ACE}

	hand := []CARD_RANK{cards[0].rank, cards[1].rank, cards[2].rank, cards[3].rank, cards[4].rank}

	sort.Slice(royal_flush, func(i, j int) bool {
		return royal_flush[i] < royal_flush[j]
	})

	for i := 0; i < len(hand); i++ {
		if hand[i] != royal_flush[i] {
			return false
		}
	}
	return true
}

func isStraightFlush(cards Cards) bool {
	if !isSameSuit(cards) {
		return false
	}

	cards.sortByRank()

	for i := 1; i < len(cards)-1; i++ {
		res := cards[i+1].rank - cards[i].rank

		if res != 1 {
			return false
		}
	}

	return true
}

func isFourOfAKind(cards Cards) bool {
	cards.sortByRank()

	var z [14]CARD_RANK

	for i := 0; i < len(cards); i++ {
		z[cards[i].rank]++
	}

	for i := 0; i < len(z); i++ {
		if z[i] >=4 {
			return true
		}
	}

	return false
}

func isSame(cards ...CARD_RANK) bool {
	for i := 0; i < len(cards)-1; i++ {
		if cards[i] != cards[i+1] {
			return false
		}
	}
	return true
}

func isFullHouse(cards Cards) bool {
	cards.sortByRank()

	if isSame(cards[0].rank, cards[1].rank, cards[2].rank) {
		if isSame(cards[3].rank, cards[4].rank) {
			return true
		}
	}

	if isSame(cards[0].rank, cards[1].rank) {
		if isSame(cards[2].rank, cards[3].rank, cards[4].rank) {
			return true
		}
	}

	return false
}

func isFlush(cards Cards) bool {
	return isSameSuit(cards)
}

func (cards *Cards) sortByRank() {
	c := *cards
	sort.Slice(c, func(i, j int) bool {
		return c[i].rank < c[j].rank
	})
}

func isStraight(cards Cards) bool {
	cards.sortByRank()

	for i := 0; i+1 < len(cards); i++ {
		res := cards[i+1].rank - cards[i].rank
		if res != 1 {
			return false
		}
	}
	return true
}

func isThreeOfAKind(cards Cards) bool {
	cards.sortByRank()

	var r [14]CARD_RANK

	for i := 0; i+1 < len(cards); i++ {
		r[cards[i].rank]++
	}

	for i := 0; i+1 < len(r); i++ {
		if r[i] >= 3 {
			return true
		}
	}

	return false
}

func isTwoPairs(cards Cards) bool {
	var r [14]CARD_RANK

	for i := 0; i+1 < len(cards); i++ {
		r[cards[i].rank]++
	}

	pairs := 0

	for i := 0; i+1 < len(r); i++ {
		if r[i] >= 2 {
			pairs++
		}
	}

	return pairs > 1
}

func isPair(cards Cards) bool {
	var r [14]CARD_RANK

	for i := 0; i+1 < len(cards); i++ {
		r[cards[i].rank]++
	}

	for i := 0; i+1 < len(r); i++ {
		if r[i] >= 2 {
			return true
		}
	}

	return false
}

func calculateHand(cards Cards) HAND_SCORING {
	if isRoyalFlush(cards) {
		return HAND_ROYAL_FLUSH
	}

	if isStraightFlush(cards) {
		return HAND_STRAIGHT_FLUSH
	}

	if isFourOfAKind(cards) {
		return HAND_FOUR_OF_A_KIND
	}

	if isFullHouse(cards) {
		return HAND_FULL_HOUSE
	}

	if isFlush(cards) {
		return HAND_FLUSH
	}

	if isStraight(cards) {
		return HAND_STRAIGHT
	}

	if isThreeOfAKind(cards) {
		return HAND_THREE_OF_A_KIND
	}

	if isTwoPairs(cards) {
		return HAND_TWO_PAIRS
	}

	if isPair(cards) {
		return HAND_PAIR
	}

	return HAND_HIGHCARD
}

func (game *Game) calculateScoring() {
	for i := 0; i < len(game.players); i++ {
		cards := game.players[i].cards
		score := calculateHand(cards)
		game.players[i].score = score
	}

	sort.Slice(game.players, func(i, j int) bool {
		return game.players[i].score < game.players[j].score
	})
}