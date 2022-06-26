<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../src/chapter10/question10.04/SortedSearchNoSize.php';
require_once __DIR__ . '/../../../src/chapter10/question10.04/Listy.php';

class SortedSearchNoSizeTest extends TestCase
{
	protected SortedSearchNoSize $sut;

	/**
	 * @dataProvider sortedSearchNoSizeProvider()
	 */
	public function testSortedSearchNoSize(array $items, int $target, int $expected)
	{
		//Arrange
		$listy = new Listy($items);
		$this->sut = new SortedSearchNoSize($listy);


		//Act
		$actual = $this->sut->search($target);

		//Assert
		$this->assertEquals($expected, $actual);
	}

	public function sortedSearchNoSizeProvider(): array
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
				[1, 2, 3],
				1,
				0
			],
			[
				[1, 2, 3],
				2,
				1
			],
			[
				[1, 2, 3],
				3,
				2
			],
			[
				[1, 2, 3, 4],
				3,
				2
			],
			[
				[1, 2, 3, 4],
				4,
				3
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				1,
				0
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				2,
				1
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				3,
				2
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				4,
				3
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				5,
				4
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				6,
				5
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				7,
				6
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				8,
				7
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				9,
				8
			],
			[
				[1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
				10,
				9
			],
		];
	}
}
