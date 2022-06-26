<?php

class Listy
{
	protected array $items;

	const ITEM_NOT_FOUND = -1;

	public function __construct(array $items)
	{
		$this->items = $items;
	}

	public function elementAt(int $item): int
	{
		$result = self::ITEM_NOT_FOUND;

		$index = array_search($item, $this->items);
		if (is_int($index)) {
			$result = $index;
		}

		return $result;
	}
}
