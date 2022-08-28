package main

import (
	"github.com/stretchr/testify/assert"
	"testing"
)

func TestIsSameSuit(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_TEN_OF_CLUBS,
		CARD_LABEL_JACK_OF_CLUBS,
		CARD_LABEL_QUEEN_OF_CLUBS,
		CARD_LABEL_KING_OF_CLUBS,
		CARD_LABEL_ACE_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := isSameSuit(hand)
	assert.True(t, result)
}

func TestHandContainsRoyalFlush(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_TEN_OF_CLUBS,
		CARD_LABEL_JACK_OF_CLUBS,
		CARD_LABEL_QUEEN_OF_CLUBS,
		CARD_LABEL_KING_OF_CLUBS,
		CARD_LABEL_ACE_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := calculateHand(hand)
	assert.Equal(t, result, HAND_ROYAL_FLUSH)
}

func TestHandContainsStraightFlush(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_TWO_OF_CLUBS,
		CARD_LABEL_THREE_OF_CLUBS,
		CARD_LABEL_FOUR_OF_CLUBS,
		CARD_LABEL_FIVE_OF_CLUBS,
		CARD_LABEL_SIX_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := calculateHand(hand)
	assert.Equal(t, result, HAND_STRAIGHT_FLUSH)
}

func TestContainsFourOfAKind(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_TWO_OF_CLUBS,
		CARD_LABEL_TWO_OF_DIAMONDS,
		CARD_LABEL_TWO_OF_HEARTS,
		CARD_LABEL_TWO_OF_SPADES,
		CARD_LABEL_ACE_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := calculateHand(hand)
	assert.Equal(t, result, HAND_FOUR_OF_A_KIND)
}

func TestHandContainsFullHouse(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_KING_OF_CLUBS,
		CARD_LABEL_KING_OF_DIAMONDS,
		CARD_LABEL_KING_OF_HEARTS,
		CARD_LABEL_THREE_OF_SPADES,
		CARD_LABEL_THREE_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := calculateHand(hand)
	assert.Equal(t, result, HAND_FULL_HOUSE)
}

func TestHandContainsFlush(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_TEN_OF_CLUBS,
		CARD_LABEL_THREE_OF_CLUBS,
		CARD_LABEL_THREE_OF_CLUBS,
		CARD_LABEL_TWO_OF_CLUBS,
		CARD_LABEL_ACE_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := calculateHand(hand)
	assert.Equal(t, result, HAND_FLUSH)
}

func TestHandContainsStraight(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_TWO_OF_CLUBS,
		CARD_LABEL_THREE_OF_CLUBS,
		CARD_LABEL_FOUR_OF_HEARTS,
		CARD_LABEL_FIVE_OF_CLUBS,
		CARD_LABEL_ACE_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := calculateHand(hand)
	assert.Equal(t, result, HAND_STRAIGHT)
}

func TestHandContainsThreeOfAKind(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_TWO_OF_CLUBS,
		CARD_LABEL_TWO_OF_CLUBS,
		CARD_LABEL_TWO_OF_HEARTS,
		CARD_LABEL_THREE_OF_HEARTS,
		CARD_LABEL_ACE_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := calculateHand(hand)
	assert.Equal(t, result, HAND_THREE_OF_A_KIND)
}

func TestHandContainsTwoPairs(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_TWO_OF_CLUBS,
		CARD_LABEL_TWO_OF_CLUBS,
		CARD_LABEL_ACE_OF_HEARTS,
		CARD_LABEL_ACE_OF_CLUBS,
		CARD_LABEL_JACK_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := calculateHand(hand)
	assert.Equal(t, result, HAND_TWO_PAIRS)
}

func TestHandContainsPair(t *testing.T) {
	cards := []CARD_LABEL{
		CARD_LABEL_TWO_OF_CLUBS,
		CARD_LABEL_TWO_OF_SPADES,
		CARD_LABEL_ACE_OF_SPADES,
		CARD_LABEL_THREE_OF_CLUBS,
		CARD_LABEL_FOUR_OF_CLUBS,
	}

	hand := HandFactory(cards)
	result := calculateHand(hand)
	assert.Equal(t, result, HAND_PAIR)
}
