<?php

namespace MasterMind;


class GuessCounts
{
    public $correctColorCorrectColumn = 0;
    public $correctColorWrongColumn = 0;

    /**
     * GuessCounts constructor.
     * @param int $correctColorCorrectColumn
     * @param int $correctColorWrongColumn
     */
    public function __construct($correctColorCorrectColumn, $correctColorWrongColumn)
    {
        $this->correctColorCorrectColumn = $correctColorCorrectColumn;
        $this->correctColorWrongColumn = $correctColorWrongColumn;
    }

}