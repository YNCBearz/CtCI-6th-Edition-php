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
				[0],
				0,
				0
			]
		];
	}
}
