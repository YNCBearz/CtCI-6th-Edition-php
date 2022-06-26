<?php

class SparseSearch
{
	protected array $items;

	const ITEM_NOT_FOUND = -1;

	public function __construct(array $items)
	{
		$this->items = $items;
	}

	public function search(string $target): int
	{
		if (count($this->items) == 0) {
			return self::ITEM_NOT_FOUND;
		}

		if (count($this->items) == 1) {
			return ($this->items[0] == $target)
				? 0
				: self::ITEM_NOT_FOUND;
		}

		$midPointInfo = $this->getMidPointInfo();

		$midPointValue = $midPointInfo['value'];
		$midPointIndex = $midPointInfo['index'];

		$currentValue = $midPointValue;
		$currentIndex = $midPointIndex;

		if ($midPointValue == '') {
			$closestPointInfo = $this->findClosestNotEmptyPoint($midPointIndex);

			$currentIndex = $closestPointInfo['index'];

			if ($currentIndex == self::ITEM_NOT_FOUND) {
				return self::ITEM_NOT_FOUND;
			}

			$currentValue = $closestPointInfo['value'];
		}

		if ($currentValue == $target) {
			return $currentIndex;
		}

		if (strnatcmp($currentValue, $target) > 0) {
			return $this->searchLeft($target, $currentIndex);
		}

		if (strnatcmp($currentValue, $target) < 0) {
			return $this->searchRight($target, $currentIndex);
		}
	}

	private function getMidPointInfo(): array
	{
		$items = $this->items;

		$index = (int)floor((count($items) - 1) / 2);
		$value = $items[$index];

		return [
			'index' => $index,
			'value' => $value
		];
	}

	private function searchRight(string $target, int $startIndex): int
	{
		$items = $this->items;

		for ($i = $startIndex; $i <= count($items) - 1; $i++) {
			if ($items[$i] == $target) {
				return $i;
			}
		}

		return self::ITEM_NOT_FOUND;
	}

	private function searchLeft(string $target, int $startIndex): int
	{
		$items = $this->items;

		for ($i = $startIndex; $i >= 0; $i--) {
			if ($items[$i] == $target) {
				return $i;
			}
		}

		return self::ITEM_NOT_FOUND;
	}

	private function findClosestNotEmptyPoint(int $midPointIndex)
	{
		$i = 1;
		$j = 1;

		$closestNotEmptyPointIndex = self::ITEM_NOT_FOUND;
		$closestNotEmptyPointValue = '';

		while (
			isset($this->items[$midPointIndex + $i]) ||
			isset($this->items[$midPointIndex - $j])
		) {
			if (
				isset($this->items[$midPointIndex + $i]) &&
				$this->items[$midPointIndex + $i] != ''
			) {
				$closestNotEmptyPointIndex = $midPointIndex + $i;
				$closestNotEmptyPointValue = $this->items[$closestNotEmptyPointIndex];
				break;
			}

			if (
				isset($this->items[$midPointIndex - $j]) &&
				$this->items[$midPointIndex - $j] != ''
			) {
				$closestNotEmptyPointIndex = $midPointIndex - $j;
				$closestNotEmptyPointValue = $this->items[$closestNotEmptyPointIndex];
				break;
			}

			$i++;
			$j--;
		}

		return [
			'index' => $closestNotEmptyPointIndex,
			'value' => $closestNotEmptyPointValue
		];
	}
}
