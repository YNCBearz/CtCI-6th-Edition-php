<?php

class SearchedInRotatedArray
{
	const TARGET_NOT_FOUND = -1;

	public function search(array $items, int $target): int
	{
		if (count($items) == 0) {
			return self::TARGET_NOT_FOUND;
		}

		if (count($items) == 1) {
			return ($items[0] == $target)
				? 0
				: self::TARGET_NOT_FOUND;
		}

		if (count($items) == 2) {
			return $this->searchRight($items, $target, 0);
		}

		$midPointInfo = $this->getMidPointInfo($items);

		$midPointIndex = $midPointInfo['index'];
		$midPoint = $midPointInfo['value'];

		if ($midPoint == $target) {
			return $midPointIndex;
		}

		if ($midPoint > $target) {
			if (($target >= $items[$midPointIndex - 1])) {
				return $this->searchLeft($items, $target, $midPointIndex);
			}

			if ($target >= $items[$midPointIndex + 1]) {
				return $this->searchRight($items, $target, $midPointIndex);
			}
		}
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

		return self::TARGET_NOT_FOUND;
	}

	private function searchLeft(array $items, int $target, int $startIndex): int
	{
		for ($i = $startIndex; $i >= 0; $i--) {
			if ($items[$i] == $target) {
				return $i;
			}
		}

		return self::TARGET_NOT_FOUND;
	}
}
