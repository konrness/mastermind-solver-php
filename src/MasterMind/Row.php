<?php

namespace MasterMind;


class Row
{

    /**
     * @var int[]
     */
    public $colors;

    /**
     * Guess constructor.
     * @param int[] $colors
     */
    public function __construct(array $colors)
    {
        $this->colors = $colors;
    }

    /**
     * @return int[]
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * @param int[] $colors
     */
    public function setColors($colors)
    {
        $this->colors = $colors;
    }

    /**
     * @param Row $guess
     * @return GuessCounts
     */
    public function getGuessCounts(Row $guess)
    {
        $correctColumns = [];

        // count correct color/column
        foreach ($this->colors as $column => $color) {
            if ($color === $guess->colors[$column]) {
                $correctColumns[] = $column;
            }
        }

        // column that correct color matches
        $guessMatchColumns = [];

        // count correct color, wrong column
        foreach ($this->colors as $column => $color) {
            // stop checking if this column is already known to be correct
            if (in_array($column, $correctColumns)) {
                continue;
            }

            foreach ($guess->colors as $guessColumn => $guessColor) {

                // stop checking if guess column is a known correct column and color
                if (in_array($guessColumn, $correctColumns)) {
                    continue;
                }

                // stop checking if this guess column is already counted as a correct color
                if (in_array($guessColumn, $guessMatchColumns)) {
                    continue;
                }

                if ($color === $guessColor) {
                    $guessMatchColumns[] = $guessColumn;
                }
            }
        }

        return new GuessCounts(count($correctColumns), count($guessMatchColumns));
    }

    public function __toString()
    {
        $output = [];

        foreach ($this->colors as $color) {
            $output[] = ColorNames::colorName($color);
        }

        return implode(", ", $output);
    }


}