<?php

class SparseSearch
{
	protected array $items;

	const ITEM_NOT_FOUND = -1;

	public function __construct(array $items)
	{
		$this->items = $items;
	}

	public function search(string $target, ?int $left = null, ?int $right = null): int
	{
		$items = $this->items;

		if (count($items) == 0) {
			return self::ITEM_NOT_FOUND;
		}

		if (count($items) == 1) {
			return ($items[0] == $target)
				? 0
				: self::ITEM_NOT_FOUND;
		}

		if (is_null($left)) {
			$left = 0;
		}

		if (is_null($right)) {
			$right = count($items) - 1;
		}

		if ($left > $right) {
			return self::ITEM_NOT_FOUND;
		}

		$mid = floor(($left + $right) / 2);

		$currentIndex = $mid;
		$currentValue = $items[$mid];

		if ($currentValue == '') {
			$closestNotEmptyPointInfo = $this->findClosestNotEmptyPoint($currentIndex);

			$currentIndex = $closestNotEmptyPointInfo['index'];
			$currentValue = $closestNotEmptyPointInfo['value'];

			if ($currentIndex == self::ITEM_NOT_FOUND) {
				return self::ITEM_NOT_FOUND;
			}
		}

		if ($currentValue == $target) {
			return $currentIndex;
		}

		if ($items[$left] == $target) {
			return $left;
		}

		if ($items[$right] == $target) {
			return $right;
		}

		if (strnatcmp($currentValue, $target) > 0) {
			return $this->search($target, $left, $currentIndex - 1);
		}

		if (strnatcmp($currentValue, $target) < 0) {
			return $this->search($target, $currentIndex, $right - 1);
		}

		return self::ITEM_NOT_FOUND;
	}

	private function findClosestNotEmptyPoint(int $midPointIndex)
	{
		$closestNotEmptyPointIndex = self::ITEM_NOT_FOUND;
		$closestNotEmptyPointValue = '';

		$left = $midPointIndex - 1;
		$right = $midPointIndex + 1;

		while (
			isset($this->items[$left]) ||
			isset($this->items[$right])
		) {
			if (
				isset($this->items[$right]) &&
				$this->items[$right] != ''
			) {
				$closestNotEmptyPointIndex = $right;
				$closestNotEmptyPointValue = $this->items[$closestNotEmptyPointIndex];
				break;
			}

			if (
				isset($this->items[$left]) &&
				$this->items[$left] != ''
			) {
				$closestNotEmptyPointIndex = $left;
				$closestNotEmptyPointValue = $this->items[$closestNotEmptyPointIndex];
				break;
			}

			$right++;
			$left--;

			if ($left > $right) {
				break;
			}
		}

		return [
			'index' => $closestNotEmptyPointIndex,
			'value' => $closestNotEmptyPointValue
		];
	}
}
