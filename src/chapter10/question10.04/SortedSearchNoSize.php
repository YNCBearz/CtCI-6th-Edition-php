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

		$midPointInfo = $this->getMidPointInfo($index);

		$midPointValue = $midPointInfo['value'];
		$midPointIndex = $midPointInfo['index'];

		if ($midPointValue == $target) {
			return $midPointIndex;
		}


		if ($midPointValue > $target) {
			return $this->searchLeft($target, $midPointIndex, 0);
		}

		if ($midPointValue < $target) {
			return $this->searchRight($target, $midPointIndex, $index * 2);
		}

		return self::ITEM_NOT_FOUND;
	}

	private function searchRight(int $target, int $startIndex, int $endIndex): int
	{
		for ($i = $startIndex; $i <= $endIndex; $i++) {
			$item = $this->listy->elementAt($i);
			if ($item === $target) {
				return $i;
			}

			if ($item == self::ITEM_NOT_FOUND) {
				break;
			}
		}

		return self::ITEM_NOT_FOUND;
	}

	private function searchLeft(int $target, int $startIndex, int $endIndex): int
	{
		for ($i = $startIndex; $i >= $endIndex; $i--) {
			$item = $this->listy->elementAt($i);
			if ($item === $target) {
				return $i;
			}
		}

		return self::ITEM_NOT_FOUND;
	}

	private function getMidPointInfo(int $index): array
	{
		$midPointIndex = (int)floor($index / 2);
		$midPointValue = $this->listy->elementAt($midPointIndex);

		return [
			'index' => $midPointIndex,
			'value' => $midPointValue,
		];
	}
}
