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
				['a'],
				'a',
				0
			],
		];
	}
}
