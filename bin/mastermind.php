<?php

include __DIR__ . "/../vendor/autoload.php";

// generate guesses
$guesses = \MasterMind\GuessGenerator::generateGuesses();


$currentGuessCounts = new \MasterMind\GuessCounts(0,0);

do {

    if (count($guesses) == 0) {
        echo "That's impossible! Something got screwed up.\n";
        exit();
    }

    // select random pattern from available guesses
    $currentGuess = $guesses[array_rand($guesses)];

    echo "Play this guess (" . count($guesses) . "): " . $currentGuess . PHP_EOL;

    $reds = (int) readline("How many reds? ");
    $whites = (int) readline("How many whites? ");

    if ($reds == 4) {

        echo "Hooray! We won!\n";
        exit();
    }

    // remove guesses that would result in this pattern
    foreach ($guesses as $i => $testGuess) {
        $currentGuessCounts = $testGuess->getGuessCounts($currentGuess);

        if ($currentGuessCounts->correctColorCorrectColumn <> $reds || $currentGuessCounts->correctColorWrongColumn <> $whites) {
            // this combination is not possible with the provided guess, so remove it as a possible guess
            unset($guesses[$i]);
        }
    }

} while(true);

exit("Ending early...\n");