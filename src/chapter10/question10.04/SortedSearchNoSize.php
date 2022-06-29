<?php

class SortedSearchNoSize
{
	protected Listy $listy;

	const ITEM_NOT_FOUND = -1;

	public function __construct(Listy $listy)
	{
		$this->listy = $listy;
	}

	public function search(int $target): int
	{
		$firstItem = $this->listy->elementAt(0);
		if ($firstItem == self::ITEM_NOT_FOUND) {
			return self::ITEM_NOT_FOUND;
		}

		if ($firstItem == $target) {
			return 0;
		}

		$index = 1;
		while ($this->listy->elementAt($index) != self::ITEM_NOT_FOUND) {
			$index = $index * 2;
		}

		return $this->binarySearch($target, 0, $index);
	}

	private function binarySearch(int $target, int $left, int $right): int
	{
		while ($left <= $right) {
			$midPointIndex = (int)floor(($left + $right) / 2);
			$midPointValue = $this->listy->elementAt($midPointIndex);

			if ($midPointValue > $target || $midPointValue == -1) {
				$right = $midPointIndex - 1;
			} else if ($midPointValue < $target) {
				$left = $midPointIndex + 1;
			} else {
				return $midPointIndex;
			}
		}

		return self::ITEM_NOT_FOUND;
	}
}
