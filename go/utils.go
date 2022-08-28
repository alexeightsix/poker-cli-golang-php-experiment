package main

import (
	"math/rand"
	"time"
)

func randomNumber(to int) int {
	s1 := rand.NewSource(time.Now().UnixNano())
	r1 := rand.New(s1)
	return r1.Intn(to) + 1
}