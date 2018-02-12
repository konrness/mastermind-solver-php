<?php

namespace MasterMind;


class GuessGenerator
{
    /**
     * @param int $numColors
     * @param int $numPegs
     * @param bool $duplicatesAllowed
     * @return Row[]
     */
    public static function generateGuesses($numColors = 6, $numPegs = 4, $duplicatesAllowed = true)
    {
        /**
         *
         * Input: 6, 4, true
         *
         * Output:
         *  [
         *    [0,0,0,0],
         *    [1,0,0,0],
         *    [2,0,0,0],
         *    ...
         *    [5,0,0,0],
         *    [0,1,0,0],
         *    ...
         *    [0,2,3,4],
         *    [1,2,3,4],
         *    ...
         *    [5,2,3,4],
         *    [0,3,3,4],
         *    ...
         *    [5,5,5,5]
         *  ]
         */

        $guesses = [];

        // @todo Refactor to support arbitrary number of pegs and use $numPegs parameter

        for ($peg1 = 0; $peg1 < $numColors; $peg1++) {
            for ($peg2 = 0; $peg2 < $numColors; $peg2++) {
                for ($peg3 = 0; $peg3 < $numColors; $peg3++) {
                    for ($peg4 = 0; $peg4 < $numColors; $peg4++) {
                        $guesses[] = new Row([$peg1, $peg2, $peg3, $peg4]);
                    }
                }
            }
        }

        // @todo Implement $duplicatesAllowed parameter

        if ($duplicatesAllowed === false) {
            throw new \InvalidArgumentException("No duplicates not yet implemented");
        }

        return $guesses;

    }
}