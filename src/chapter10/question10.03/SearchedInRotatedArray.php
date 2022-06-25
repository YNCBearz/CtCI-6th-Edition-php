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
	}
}
