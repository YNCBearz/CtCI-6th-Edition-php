<?php

class Listy
{
	protected array $items;

	const ITEM_NOT_FOUND = -1;

	public function __construct(array $items)
	{
		$this->items = $items;
	}

	public function elementAt(int $index): int
	{
		$result = self::ITEM_NOT_FOUND;

		if (isset($this->items[$index])) {
			return $this->items[$index];
		}

		return $result;
	}
}
