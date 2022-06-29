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
			$mid = (int)floor(($left + $right) / 2);
			$midValue = $this->listy->elementAt($mid);

			if ($midValue > $target || $midValue == -1) {
				$right = $mid - 1;
			} else if ($midValue < $target) {
				$left = $mid + 1;
			} else {
				return $mid;
			}
		}

		return self::ITEM_NOT_FOUND;
	}
}
