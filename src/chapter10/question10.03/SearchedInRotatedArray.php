<?php

class SearchedInRotatedArray
{
	const ITEM_NOT_FOUND = -1;

	public function search(array $items, int $target, ?int $left = null, ?int $right = null): int
	{
		$originalItemsCount = count($items);

		if ($originalItemsCount == 0) {
			return self::ITEM_NOT_FOUND;
		}

		if ($originalItemsCount == 1) {
			return ($items[0] == $target)
				? 0
				: self::ITEM_NOT_FOUND;
		}

		if (is_null($left)) {
			$left = 0;
		}

		if (is_null($right)) {
			$right = $originalItemsCount - 1;
		}

		$mid = (int)floor(($left + $right) / 2);

		if ($mid < 0) {
			return self::ITEM_NOT_FOUND;
		}

		if ($items[$mid] == $target) {
			return $mid;
		}

		if ($items[$left] == $target) {
			return $left;
		}

		if ($items[$right] == $target) {
			return $right;
		}

		$isLeftSorted = ($items[$left] <= $items[$mid])
			? true
			: false;

		$isRightSorted = ($items[$mid] <= $items[$right])
			? true
			: false;

		if (
			($items[$left] < $target) &&
			($target < $items[$mid]) &&
			$isLeftSorted
		) {
			return $this->binarySearch($items, $target, $left, $mid);
		}

		if (
			($items[$mid] < $target) &&
			($target < $items[$right]) &&
			$isRightSorted
		) {
			return $this->binarySearch($items, $target, $mid, $right);
		}

		if ($isLeftSorted) {
			return $this->search($items, $target, $mid, $right - 1);
		}

		if ($isRightSorted) {
			return $this->search($items, $target, $left, $mid - 1);
		}

		return self::ITEM_NOT_FOUND;
	}

	private function binarySearch(array $items, int $target, int $left, int $right): int
	{
		$originalItemsCount = count($items);

		if ($originalItemsCount == 0) {
			return self::ITEM_NOT_FOUND;
		}

		if ($originalItemsCount == 1) {
			return ($items[0] == $target)
				? 0
				: self::ITEM_NOT_FOUND;
		}

		$mid = (int)floor(($left + $right) / 2);

		if ($items[$mid] == $target) {
			return $mid;
		}

		if ($items[$left] == $target) {
			return $left;
		}

		if ($items[$right] == $target) {
			return $right;
		}

		if ($items[$mid] > $target) {
			return $this->binarySearch($items, $target, $left, $mid);
		} else {
			return $this->binarySearch($items, $target, $mid, $right);
		}
	}
}
