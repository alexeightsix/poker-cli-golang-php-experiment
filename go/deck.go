package main

import (
	"math/rand"
	"time"
)

type Deck []Card

func (deck *Deck) pluck() Cards {
	old := *deck

	c := append(old[:1])
	*deck = append(old[1:])

	return Cards{
		c[0],
	}
}

func GenerateDeck(shuffle bool) Deck {
	var a Deck

	a = append(a, Card{
		utf8:  "\U0001F0A1",
		label: CARD_LABEL_ACE_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_ACE,
	})

	a = append(a, Card{
		utf8:  "\U0001F0A2",
		label: CARD_LABEL_TWO_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_2,
	})

	a = append(a, Card{
		utf8:  "\U0001F0A3",
		label: CARD_LABEL_THREE_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_3,
	})

	a = append(a, Card{
		utf8:  "\U0001F0A4",
		label: CARD_LABEL_FOUR_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_4,
	})

	a = append(a, Card{
		utf8:  "\U0001F0A5",
		label: CARD_LABEL_FIVE_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_5,
	})

	a = append(a, Card{
		utf8:  "\U0001F0A6",
		label: CARD_LABEL_SIX_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_6,
	})

	a = append(a, Card{
		utf8:  "\U0001F0A7",
		label: CARD_LABEL_SEVEN_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_7,
	})

	a = append(a, Card{
		utf8:  "\U0001F0A8",
		label: CARD_LABEL_EIGHT_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_8,
	})

	a = append(a, Card{
		utf8:  "\U0001F0A9",
		label: CARD_LABEL_NINE_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_9,
	})

	a = append(a, Card{
		utf8:  "\U0001F0AA",
		label: CARD_LABEL_TEN_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_10,
	})

	a = append(a, Card{
		utf8:  "\U0001F0AB",
		label: CARD_LABEL_JACK_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_JACK,
	})

	a = append(a, Card{
		utf8:  "\U0001F0AD",
		label: CARD_LABEL_QUEEN_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_QUEEN,
	})

	a = append(a, Card{
		utf8:  "\U0001F0AE",
		label: CARD_LABEL_KING_OF_SPADES,
		suit:  CARD_SUIT_SPADES,
		rank:  CARD_RANK_KING,
	})

	a = append(a, Card{
		utf8:  "\U0001F0B1",
		label: CARD_LABEL_ACE_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_ACE,
	})

	a = append(a, Card{
		utf8:  "\U0001F0B2",
		label: CARD_LABEL_TWO_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_2,
	})

	a = append(a, Card{
		utf8:  "\U0001F0B3",
		label: CARD_LABEL_THREE_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_3,
	})

	a = append(a, Card{
		utf8:  "\U0001F0B4",
		label: CARD_LABEL_FOUR_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_4,
	})

	a = append(a, Card{
		utf8:  "\U0001F0B5",
		label: CARD_LABEL_FIVE_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_5,
	})

	a = append(a, Card{
		utf8:  "\U0001F0B6",
		label: CARD_LABEL_SIX_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_6,
	})

	a = append(a, Card{
		utf8:  "\U0001F0B7",
		label: CARD_LABEL_SEVEN_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_7,
	})

	a = append(a, Card{
		utf8:  "\U0001F0B8",
		label: CARD_LABEL_EIGHT_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_8,
	})

	a = append(a, Card{
		utf8:  "\U0001F0B9",
		label: CARD_LABEL_NINE_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_9,
	})

	a = append(a, Card{
		utf8:  "\U0001F0BA",
		label: CARD_LABEL_TEN_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_10,
	})

	a = append(a, Card{
		utf8:  "\U0001F0BB",
		label: CARD_LABEL_JACK_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_JACK,
	})

	a = append(a, Card{
		utf8:  "\U0001F0BD",
		label: CARD_LABEL_QUEEN_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_QUEEN,
	})

	a = append(a, Card{
		utf8:  "\U0001F0BE",
		label: CARD_LABEL_KING_OF_HEARTS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_KING,
	})

	a = append(a, Card{
		utf8:  "\U0001F0C1",
		label: CARD_LABEL_ACE_OF_DIAMONDS,
		suit:  CARD_SUIT_HEARTS,
		rank:  CARD_RANK_ACE,
	})

	a = append(a, Card{
		utf8:  "\U0001F0C2",
		label: CARD_LABEL_TWO_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_2,
	})

	a = append(a, Card{
		utf8:  "\U0001F0C3",
		label: CARD_LABEL_THREE_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_3,
	})

	a = append(a, Card{
		utf8:  "\U0001F0C4",
		label: CARD_LABEL_FOUR_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_4,
	})

	a = append(a, Card{
		utf8:  "\U0001F0C5",
		label: CARD_LABEL_FIVE_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_5,
	})

	a = append(a, Card{
		utf8:  "\U0001F0C6",
		label: CARD_LABEL_SIX_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_6,
	})

	a = append(a, Card{
		utf8:  "\U0001F0C7",
		label: CARD_LABEL_SEVEN_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_7,
	})

	a = append(a, Card{
		utf8:  "\U0001F0C8",
		label: CARD_LABEL_EIGHT_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_8,
	})

	a = append(a, Card{
		utf8:  "\U0001F0C9",
		label: CARD_LABEL_NINE_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_9,
	})

	a = append(a, Card{
		utf8:  "\U0001F0CA",
		label: CARD_LABEL_TEN_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_10,
	})

	a = append(a, Card{
		utf8:  "\U0001F0CB",
		label: CARD_LABEL_JACK_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_JACK,
	})

	a = append(a, Card{
		utf8:  "\U0001F0CD",
		label: CARD_LABEL_QUEEN_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_QUEEN,
	})

	a = append(a, Card{
		utf8:  "\U0001F0CE",
		label: CARD_LABEL_KING_OF_DIAMONDS,
		suit:  CARD_SUIT_DIAMONDS,
		rank:  CARD_RANK_KING,
	})

	a = append(a, Card{
		utf8:  "\U0001F0D1",
		label: CARD_LABEL_ACE_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_ACE,
	})

	a = append(a, Card{
		utf8:  "\U0001F0D2",
		label: CARD_LABEL_TWO_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_2,
	})

	a = append(a, Card{
		utf8:  "\U0001F0D3",
		label: CARD_LABEL_THREE_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_3,
	})

	a = append(a, Card{
		utf8:  "\U0001F0D4",
		label: CARD_LABEL_FOUR_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_4,
	})

	a = append(a, Card{
		utf8:  "\U0001F0D5",
		label: CARD_LABEL_FIVE_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_5,
	})

	a = append(a, Card{
		utf8:  "\U0001F0D6",
		label: CARD_LABEL_SIX_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_6,
	})

	a = append(a, Card{
		utf8:  "\U0001F0D7",
		label: CARD_LABEL_SEVEN_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_7,
	})

	a = append(a, Card{
		utf8:  "\U0001F0D8",
		label: CARD_LABEL_EIGHT_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_8,
	})

	a = append(a, Card{
		utf8:  "\U0001F0D9",
		label: CARD_LABEL_NINE_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_9,
	})

	a = append(a, Card{
		utf8:  "\U0001F0DA",
		label: CARD_LABEL_TEN_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_10,
	})

	a = append(a, Card{
		utf8:  "\U0001F0DB",
		label: CARD_LABEL_JACK_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_JACK,
	})

	a = append(a, Card{
		utf8:  "\U0001F0DD",
		label: CARD_LABEL_QUEEN_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_QUEEN,
	})

	a = append(a, Card{
		utf8:  "\U0001F0DE",
		label: CARD_LABEL_KING_OF_CLUBS,
		suit:  CARD_SUIT_CLUBS,
		rank:  CARD_RANK_KING,
	})

	if (shuffle) {
		rand.Seed(time.Now().UnixNano())
		rand.Shuffle(len(a), func(i, j int) { a[i], a[j] = a[j], a[i] })
	}

	return a
}


func HandFactory(labels []CARD_LABEL) Cards {
	hand := []Card{}
	cards := GenerateDeck(false)

	for i := 0; i < len(cards); i++ {
		for x := 0; x < len(labels); x++ {
			if (cards[i].label == labels[x]) {
				hand = append(hand, cards[i])
			}
		}
	}

	return hand
}
