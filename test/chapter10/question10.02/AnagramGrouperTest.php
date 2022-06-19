<?php

require_once __DIR__ . '/../../../src/chapter10/question10.02/AnagramGrouper.php';

class AnagramGrouperTest extends \PHPUnit\Framework\TestCase
{
    protected AnagramGrouper $sut;

    public function testGroupAnagrams()
    {
        $a = [
            'sale',
            'algorithm',
            'rock',
            'logarithm',
            'cat',
            'act',
            'cherry',
            'apple',
            'seal',
            'banana',
            'cork',
            'ales'
        ];

        $this->sut = new AnagramGrouper;

        $expected = [
            'sale',
            'seal',
            'ales',
            'algorithm',
            'logarithm',
            'rock',
            'cork',
            'cat',
            'act',
            'cherry',
            'apple',
            'banana'
        ];

        $actual = $this->sut->groupAnagrams($a);
        $this->assertEquals($expected, $actual);
    }
}
