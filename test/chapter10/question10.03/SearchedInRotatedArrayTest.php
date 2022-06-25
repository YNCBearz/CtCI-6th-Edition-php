<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../src/chapter10/question10.03/SearchedInRotatedArray.php';

class SearchedInRotatedArrayTest extends TestCase
{
	/**
	 * @dataProvider rotatedArrayProvider()
	 */
	public function testSearch($array, $target, $expected)
	{
		$this->sut = new SearchedInRotatedArray();

		$actual = $this->sut->search($array, $target);
		$this->assertEquals($expected, $actual);
	}

	public function rotatedArrayProvider(): array
	{
		return [
			[
				[],
				0,
				-1
			],
			[
				[0],
				0,
				0
			],
			[
				[0],
				1,
				-1
			],
		];
	}
}
