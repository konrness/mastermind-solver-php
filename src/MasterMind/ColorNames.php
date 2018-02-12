<?php

namespace MasterMind;


class ColorNames
{
    public static $colorNames = [
        0 => "White",
        1 => "Yellow",
        2 => "Orange",
        3 => "Pink",
        4 => "Green",
        5 => "Purple",
    ];

    public static function colorName($color)
    {
        return self::$colorNames[$color];
    }
}