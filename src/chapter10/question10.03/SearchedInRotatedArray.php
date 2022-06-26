<?php

class SearchedInRotatedArray
{
	const ITEM_NOT_FOUND = -1;

	public function search(array $items, int $target): int
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

		if ($originalItemsCount == 2) {
			return $this->searchRight($items, $target, 0);
		}

		$items = array_merge($items, $items);

		$midPointInfo = $this->getMidPointInfo($items);

		$midPointIndex = $midPointInfo['index'];
		$midPoint = $midPointInfo['value'];

		if ($midPoint == $target) {
			return $this->fixIndex($midPointIndex, $originalItemsCount);
		}

		$index = $this->searchRight($items, $target, $midPointIndex);

		return $this->fixIndex($index, $originalItemsCount);
	}

	private function getMidPointInfo(array $items): array
	{
		$index = (int)floor((count($items) - 1) / 2);
		$value = $items[$index];

		return [
			'index' => $index,
			'value' => $value
		];
	}

	private function searchRight(array $items, int $target, int $startIndex): int
	{
		for ($i = $startIndex; $i <= count($items) - 1; $i++) {
			if ($items[$i] == $target) {
				return $i;
			}
		}

		return self::ITEM_NOT_FOUND;
	}

	private function searchLeft(array $items, int $target, int $startIndex): int
	{
		for ($i = $startIndex; $i >= 0; $i--) {
			if ($items[$i] == $target) {
				return $i;
			}
		}

		return self::ITEM_NOT_FOUND;
	}

	private function fixIndex($index, $originalItemsCount): int
	{
		if ($index > $originalItemsCount - 1) {
			return $index - $originalItemsCount;
		}

		return $index;
	}
}
