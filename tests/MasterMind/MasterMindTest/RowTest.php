<?php
/**
 * Created by PhpStorm.
 * User: konr.ness
 * Date: 2/11/18
 * Time: 3:15 PM
 */

namespace MasterMindTest;

use MasterMind\GuessCounts;
use MasterMind\Row;

class RowTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @param Row $actualRow
     * @param Row $guessRow
     * @param GuessCounts $expectedGuessCounts
     *
     * @dataProvider guessCounts
     */
    public function testGetGuessCounts(Row $actualRow, Row $guessRow, GuessCounts $expectedGuessCounts)
    {
        $actualGuessCounts = $actualRow->getGuessCounts($guessRow);

        $this->assertEquals($expectedGuessCounts->correctColorCorrectColumn, $actualGuessCounts->correctColorCorrectColumn);
        $this->assertEquals($expectedGuessCounts->correctColorWrongColumn, $actualGuessCounts->correctColorWrongColumn);

        //$this->assertEquals($expectedGuessCounts, );
    }

    public function guessCounts()
    {
        return [
            // max of each
            [new Row([0,1,2,1]), new Row([0,1,2,1]), new GuessCounts(4, 0)],
            [new Row([0,1,2,1]), new Row([1,2,1,0]), new GuessCounts(0, 4)],

            // all different
            [new Row([0,1,2,4]), new Row([5,5,5,5]), new GuessCounts(0, 0)],
            [new Row([0,1,2,4]), new Row([4,5,5,5]), new GuessCounts(0, 1)],
            [new Row([0,1,2,4]), new Row([2,4,5,5]), new GuessCounts(0, 2)],
            [new Row([0,1,2,4]), new Row([1,2,4,5]), new GuessCounts(0, 3)],
            [new Row([0,1,2,4]), new Row([4,2,1,0]), new GuessCounts(0, 4)],
            [new Row([0,1,2,4]), new Row([0,5,5,5]), new GuessCounts(1, 0)],
            [new Row([0,1,2,4]), new Row([0,4,5,5]), new GuessCounts(1, 1)],
            [new Row([0,1,2,4]), new Row([4,2,2,1]), new GuessCounts(1, 2)],
            [new Row([0,1,2,4]), new Row([2,1,4,0]), new GuessCounts(1, 3)],
            [new Row([0,1,2,4]), new Row([5,5,2,4]), new GuessCounts(2, 0)],
            [new Row([0,1,2,4]), new Row([1,5,2,4]), new GuessCounts(2, 1)],
            [new Row([0,1,2,4]), new Row([0,2,1,4]), new GuessCounts(2, 2)],
            [new Row([0,1,2,4]), new Row([5,1,2,4]), new GuessCounts(3, 0)],
            [new Row([0,1,2,4]), new Row([0,1,2,4]), new GuessCounts(4, 0)],

            // two the same
            [new Row([0,1,2,2]), new Row([3,3,3,3]), new GuessCounts(0, 0)],
            [new Row([0,1,2,2]), new Row([3,2,3,3]), new GuessCounts(0, 1)],
            [new Row([0,1,2,2]), new Row([2,2,3,3]), new GuessCounts(0, 2)],
            [new Row([0,1,2,2]), new Row([2,0,1,3]), new GuessCounts(0, 3)],
            [new Row([0,1,2,2]), new Row([2,2,1,0]), new GuessCounts(0, 4)],
            [new Row([0,1,2,2]), new Row([3,3,2,3]), new GuessCounts(1, 0)],
            [new Row([0,1,2,2]), new Row([0,3,3,1]), new GuessCounts(1, 1)],
            [new Row([0,1,2,2]), new Row([2,1,0,3]), new GuessCounts(1, 2)],
            [new Row([0,1,2,2]), new Row([2,0,2,1]), new GuessCounts(1, 3)],
            [new Row([0,1,2,2]), new Row([3,1,2,3]), new GuessCounts(2, 0)],
            [new Row([0,1,2,2]), new Row([0,2,2,3]), new GuessCounts(2, 1)],
            [new Row([0,1,2,2]), new Row([0,1,2,3]), new GuessCounts(3, 0)],
            [new Row([0,1,2,2]), new Row([0,1,2,2]), new GuessCounts(4, 0)],

            // three the same
            [new Row([0,2,2,2]), new Row([3,3,3,3]), new GuessCounts(0, 0)],
            [new Row([0,2,2,2]), new Row([3,0,3,3]), new GuessCounts(0, 1)],
            [new Row([0,2,2,2]), new Row([2,0,3,3]), new GuessCounts(0, 2)],
            [new Row([0,2,2,2]), new Row([0,3,3,3]), new GuessCounts(1, 0)],
            [new Row([0,2,2,2]), new Row([2,2,3,3]), new GuessCounts(1, 1)],
            [new Row([0,2,2,2]), new Row([3.3,2,2]), new GuessCounts(2, 0)],
            [new Row([0,2,2,2]), new Row([3,0,2,2]), new GuessCounts(2, 1)],
            [new Row([0,2,2,2]), new Row([0,2,2,3]), new GuessCounts(3, 0)],
            [new Row([0,2,2,2]), new Row([0,2,2,2]), new GuessCounts(4, 0)],

            // four the same
            [new Row([2,2,2,2]), new Row([3,3,3,3]), new GuessCounts(0, 0)],
            [new Row([2,2,2,2]), new Row([3,3,2,3]), new GuessCounts(1, 0)],
            [new Row([2,2,2,2]), new Row([3,2,2,3]), new GuessCounts(2, 0)],
            [new Row([2,2,2,2]), new Row([3,2,2,2]), new GuessCounts(3, 0)],
            [new Row([2,2,2,2]), new Row([2,2,2,2]), new GuessCounts(4, 0)],

        ];
    }

}
