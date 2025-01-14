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
			[
				[0, 1],
				0,
				0
			],
			[
				[0, 1],
				1,
				1
			],
			[
				[3, 4, 5, 1, 2],
				3,
				0
			],
			[
				[3, 4, 5, 1, 2],
				4,
				1
			],
			[
				[3, 4, 5, 1, 2],
				5,
				2
			],
			[
				[3, 4, 5, 1, 2],
				1,
				3
			],
			[
				[3, 4, 5, 1, 2],
				2,
				4
			],
			[
				[3, 4, 5, 1, 2],
				6,
				-1
			],
			[
				[5, 6, 1, 2, 3, 4],
				5,
				0
			],
			[
				[5, 6, 1, 2, 3, 4],
				6,
				1
			],
			[
				[5, 6, 1, 2, 3, 4],
				1,
				2
			],
			[
				[5, 6, 1, 2, 3, 4],
				2,
				3
			],
			[
				[5, 6, 1, 2, 3, 4],
				3,
				4
			],
			[
				[5, 6, 1, 2, 3, 4],
				4,
				5
			],
			[
				[5, 6, 1, 2, 3, 4],
				7,
				-1
			]
		];
	}
}
