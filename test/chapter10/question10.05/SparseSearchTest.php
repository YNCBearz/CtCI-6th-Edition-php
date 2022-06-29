<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../../src/chapter10/question10.05/SparseSearch.php';

class SparseSearchTest extends TestCase
{
	protected SparseSearch $sut;

	/**
	 * @dataProvider sparseSearchProvider()
	 */
	public function testSearch(array $items, string $target, int $expected)
	{
		//Arrange
		$this->sut = new SparseSearch($items);

		//Act
		$actual = $this->sut->search($target);

		//Assert
		$this->assertEquals($expected, $actual);
	}

	public function sparseSearchProvider(): array
	{
		return [
			[
				[],
				'a',
				-1
			],
			[
				['a'],
				'a',
				0
			],
			[
				['a', 'b'],
				'b',
				1
			],
			[
				['a', '', 'b'],
				'b',
				2
			],
			[
				['a', 'b', '', ''],
				'b',
				1
			],
			[
				['a', '', ''],
				'b',
				-1
			],
			[
				['a', '', '', 'bb', '', 'ccc', 'dddd', '', ''],
				'a',
				0
			],
			[
				['a', '', '', 'bb', '', 'ccc', 'dddd', '', ''],
				'bb',
				3
			],
			[
				['a', '', '', 'bb', '', 'ccc', 'dddd', '', ''],
				'ccc',
				5
			],
			[
				['a', '', '', 'bb', '', 'ccc', 'dddd', '', ''],
				'dddd',
				6
			],
			[
				['a', '', '', 'bb', '', 'ccc', 'dddd', '', ''],
				'eeeee',
				-1
			],
			[
				['', '', ''],
				'a',
				-1
			],
		];
	}
}
